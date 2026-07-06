<?php
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Config.php';

/**
 * Advanced Rate Limiting System
 * Implements IP-based and identifier-based rate limiting with database persistence
 */
class RateLimiter {
    private static $instance = null;
    private $db;
    private $config;
    
    // Default settings (can be overridden by config)
    private $maxAttempts = 5;
    private $windowTime = 900; // 15 minutes
    private $lockoutTime = 900; // 15 minutes
    private $cleanupProbability = 0.1; // 10% chance to cleanup old records
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->db = Database::getInstance();
        $this->config = Config::getInstance();
        
        // Load settings from config
        $rateLimitConfig = $this->config->getRateLimitConfig();
        $this->maxAttempts = $rateLimitConfig['max_attempts'];
        $this->windowTime = $rateLimitConfig['window_time'];
        $this->lockoutTime = $rateLimitConfig['lockout_time'];
    }
    
    /**
     * Check if identifier is rate limited
     * @param string $identifier - username, email, or API endpoint
     * @param string $ipAddress - client IP address
     * @param string $type - 'login', 'api', 'general'
     * @return array - ['allowed' => bool, 'remaining' => int, 'locked' => bool, 'time_remaining' => int]
     */
    public function checkRateLimit($identifier, $ipAddress = null, $type = 'general') {
        $ipAddress = $ipAddress ?? $_SERVER['REMOTE_ADDR'];
        
        // Random cleanup of old records
        if (mt_rand() < $this->cleanupProbability) {
            $this->cleanup();
        }
        
        // Check if IP is currently locked
        if ($this->isLocked($ipAddress, $identifier)) {
            $timeRemaining = $this->getLockTimeRemaining($ipAddress, $identifier);
            return [
                'allowed' => false,
                'remaining' => 0,
                'locked' => true,
                'time_remaining' => $timeRemaining,
                'message' => "Too many attempts. Please try again in {$timeRemaining} seconds."
            ];
        }
        
        // Get current attempts in window
        $currentAttempts = $this->getCurrentAttempts($ipAddress, $identifier);
        $remaining = max(0, $this->maxAttempts - $currentAttempts);
        
        if ($currentAttempts >= $this->maxAttempts) {
            // Lock the identifier
            $this->lockIdentifier($ipAddress, $identifier);
            $this->logViolation($ipAddress, $identifier, $currentAttempts, $type);
            
            return [
                'allowed' => false,
                'remaining' => 0,
                'locked' => true,
                'time_remaining' => $this->lockoutTime,
                'message' => "Too many attempts. Account locked for {$this->lockoutTime} seconds."
            ];
        }
        
        // Record this attempt
        $this->recordAttempt($ipAddress, $identifier);
        
        return [
            'allowed' => true,
            'remaining' => $remaining - 1, // -1 because we're about to make an attempt
            'locked' => false,
            'time_remaining' => 0,
            'message' => "Rate limit OK. {$remaining} attempts remaining."
        ];
    }
    
    /**
     * Record a successful attempt (resets the counter)
     */
    public function recordSuccess($identifier, $ipAddress = null) {
        $ipAddress = $ipAddress ?? $_SERVER['REMOTE_ADDR'];
        
        // Remove all rate limit records for this identifier
        $sql = "DELETE FROM rate_limits 
                WHERE ip_address = ? AND identifier = ? 
                AND window_start >= DATE_SUB(NOW(), INTERVAL ? SECOND)";
        
        $this->db->query($sql, [$ipAddress, $identifier, $this->windowTime]);
    }
    
    /**
     * Get current number of attempts in the time window
     */
    private function getCurrentAttempts($ipAddress, $identifier) {
        $sql = "SELECT COUNT(*) as count 
                FROM rate_limits 
                WHERE ip_address = ? AND identifier = ? 
                AND window_start >= DATE_SUB(NOW(), INTERVAL ? SECOND)";
        
        $result = $this->db->fetch($sql, [$ipAddress, $identifier, $this->windowTime]);
        return (int)$result['count'];
    }
    
    /**
     * Record an attempt
     */
    private function recordAttempt($ipAddress, $identifier) {
        $sql = "INSERT INTO rate_limits (ip_address, identifier, attempt_count, window_start, last_attempt)
                VALUES (?, ?, 1, NOW(), NOW())
                ON DUPLICATE KEY UPDATE 
                attempt_count = attempt_count + 1,
                last_attempt = NOW()";
        
        $this->db->query($sql, [$ipAddress, $identifier]);
    }
    
    /**
     * Lock an identifier
     */
    private function lockIdentifier($ipAddress, $identifier) {
        $lockUntil = date('Y-m-d H:i:s', time() + $this->lockoutTime);
        
        $sql = "UPDATE rate_limits 
                SET is_locked = TRUE, locked_until = ?
                WHERE ip_address = ? AND identifier = ?
                AND window_start >= DATE_SUB(NOW(), INTERVAL ? SECOND)";
        
        $this->db->query($sql, [$lockUntil, $ipAddress, $identifier, $this->windowTime]);
    }
    
    /**
     * Check if identifier is locked
     */
    private function isLocked($ipAddress, $identifier) {
        $sql = "SELECT COUNT(*) as count 
                FROM rate_limits 
                WHERE ip_address = ? AND identifier = ? 
                AND is_locked = TRUE 
                AND locked_until > NOW()";
        
        $result = $this->db->fetch($sql, [$ipAddress, $identifier]);
        return (int)$result['count'] > 0;
    }
    
    /**
     * Get remaining lock time
     */
    private function getLockTimeRemaining($ipAddress, $identifier) {
        $sql = "SELECT UNIX_TIMESTAMP(locked_until) - UNIX_TIMESTAMP() as remaining 
                FROM rate_limits 
                WHERE ip_address = ? AND identifier = ? 
                AND is_locked = TRUE 
                AND locked_until > NOW()
                ORDER BY locked_until DESC 
                LIMIT 1";
        
        $result = $this->db->fetch($sql, [$ipAddress, $identifier]);
        return (int)($result['remaining'] ?? 0);
    }
    
    /**
     * Log a rate limit violation
     */
    private function logViolation($ipAddress, $identifier, $attemptCount, $type) {
        $userId = null;
        
        // Try to get user ID if this is a login attempt
        if ($type === 'login') {
            $userSql = "SELECT id FROM users WHERE username = ? OR email = ?";
            $userResult = $this->db->fetch($userSql, [$identifier, $identifier]);
            $userId = $userResult['id'] ?? null;
        }
        
        $logData = [
            'ip_address' => $ipAddress,
            'identifier' => $identifier,
            'user_id' => $userId,
            'attempt_count' => $attemptCount,
            'violation_type' => $type,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
        ];
        
        $this->db->insert('rate_limit_violations', $logData);
    }
    
    /**
     * Clean up old records
     */
    private function cleanup() {
        // Clean old rate limit records
        $sql1 = "DELETE FROM rate_limits 
                 WHERE window_start < DATE_SUB(NOW(), INTERVAL 24 HOUR)";
        $this->db->query($sql1);
        
        // Clean old violation logs
        $sql2 = "DELETE FROM rate_limit_violations 
                 WHERE violation_time < DATE_SUB(NOW(), INTERVAL 7 DAY)";
        $this->db->query($sql2);
    }
    
    /**
     * Get rate limit statistics for admin dashboard
     */
    public function getStatistics() {
        $stats = [];
        
        // Total violations today
        $sql1 = "SELECT COUNT(*) as count 
                 FROM rate_limit_violations 
                 WHERE DATE(violation_time) = CURDATE()";
        $stats['violations_today'] = (int)$this->db->fetch($sql1)['count'];
        
        // Currently locked IPs
        $sql2 = "SELECT COUNT(DISTINCT ip_address) as count 
                 FROM rate_limits 
                 WHERE is_locked = TRUE AND locked_until > NOW()";
        $stats['currently_locked'] = (int)$this->db->fetch($sql2)['count'];
        
        // Top violating IPs
        $sql3 = "SELECT ip_address, COUNT(*) as violations 
                 FROM rate_limit_violations 
                 WHERE violation_time >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
                 GROUP BY ip_address 
                 ORDER BY violations DESC 
                 LIMIT 10";
        $stats['top_violators'] = $this->db->fetchAll($sql3);
        
        return $stats;
    }
}
