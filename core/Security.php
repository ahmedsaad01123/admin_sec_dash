<?php
require_once __DIR__ . '/RateLimiter.php';

class Security {
    private static $instance = null;
    private $rateLimiter;
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->rateLimiter = RateLimiter::getInstance();
    }
    
    public function initSecureSession() {
        // Secure session settings
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');
        ini_set('session.use_strict_mode', 1);
        ini_set('session.cookie_samesite', 'Strict');
        
        session_start();
        
        // Regenerate session ID to prevent session fixation
        if (!isset($_SESSION['initiated'])) {
            session_regenerate_id(true);
            $_SESSION['initiated'] = true;
            $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            
            // Safe IP partial extraction
            $ipParts = explode('.', $_SERVER['REMOTE_ADDR']);
            if (count($ipParts) >= 2 && isset($ipParts[0]) && isset($ipParts[1])) {
                $_SESSION['ip_partial'] = $ipParts[0] . '.' . $ipParts[1];
            } else {
                $_SESSION['ip_partial'] = $_SERVER['REMOTE_ADDR'];
            }
        }
        
        // Session fingerprinting with partial IP to handle dynamic IPs
        if (isset($_SESSION['ip_partial']) && isset($_SERVER['REMOTE_ADDR'])) {
            $ipParts = explode('.', $_SERVER['REMOTE_ADDR']);
            
            // Ensure we have at least 2 parts before accessing array keys
            if (count($ipParts) >= 2 && isset($ipParts[0]) && isset($ipParts[1])) {
                $currentIpPartial = $ipParts[0] . '.' . $ipParts[1];
                
                if ($_SESSION['ip_partial'] !== $currentIpPartial || 
                    $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
                    session_regenerate_id(true);
                    $_SESSION['ip_partial'] = $currentIpPartial;
                    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                }
            }
        }
        
        // Session timeout
        $maxLifetime = 3600; // 1 hour
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $maxLifetime)) {
            session_destroy();
            throw new Exception('Session expired');
        }
        $_SESSION['last_activity'] = time();
    }
    
    public function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_token_time'] = time();
        }
        return $_SESSION['csrf_token'];
    }
    
    public function verifyCSRFToken($token) {
        if (!isset($_SESSION['csrf_token']) || !isset($token)) {
            return false;
        }
        
        // Token expires after 30 minutes
        if (time() - $_SESSION['csrf_token_time'] > 1800) {
            unset($_SESSION['csrf_token']);
            return false;
        }
        
        return hash_equals($_SESSION['csrf_token'], $token);
    }
    
    public function sanitizeInput($data) {
        if (is_array($data)) {
            return array_map([$this, 'sanitizeInput'], $data);
        }
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
    
    public function validateInput($data, $rules) {
        $errors = [];
        
        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? '';
            
            foreach ($fieldRules as $rule => $ruleValue) {
                switch ($rule) {
                    case 'required':
                        if (empty($value)) {
                            $errors[$field] = $ruleValue;
                        }
                        break;
                    case 'min':
                        if (strlen($value) < $ruleValue) {
                            $errors[$field] = "Minimum {$ruleValue} characters required";
                        }
                        break;
                    case 'max':
                        if (strlen($value) > $ruleValue) {
                            $errors[$field] = "Maximum {$ruleValue} characters allowed";
                        }
                        break;
                    case 'email':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $errors[$field] = $ruleValue;
                        }
                        break;
                }
            }
        }
        
        return $errors;
    }
    
    public function checkRateLimit($identifier, $ipAddress = null, $type = 'login') {
        $ipAddress = $ipAddress ?? $_SERVER['REMOTE_ADDR'];
        
        $result = $this->rateLimiter->checkRateLimit($identifier, $ipAddress, $type);
        
        if (!$result['allowed']) {
            throw new Exception($result['message']);
        }
        
        return $result;
    }
    
    public function resetRateLimit($identifier, $ipAddress = null) {
        $ipAddress = $ipAddress ?? $_SERVER['REMOTE_ADDR'];
        $this->rateLimiter->recordSuccess($identifier, $ipAddress);
    }
    
    public function setSecurityHeaders() {
        // Prevent clickjacking
        header("X-Frame-Options: DENY");
        
        // Prevent MIME type sniffing
        header("X-Content-Type-Options: nosniff");
        
        // Enable XSS protection
        header("X-XSS-Protection: 1; mode=block");
        
        // Content Security Policy
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'");
        
        // HSTS
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
        
        // Referrer Policy
        header("Referrer-Policy: strict-origin-when-cross-origin");
    }
    
    public function hashPassword($password) {
        return password_hash($password, PASSWORD_ARGON2ID, [
            'memory_cost' => 65536,
            'time_cost' => 4,
            'threads' => 1
        ]);
    }
    
    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}
