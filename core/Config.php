<?php
/**
 * Configuration Manager
 * Handles loading and accessing configuration from .env file
 */
class Config {
    private static $instance = null;
    private $config = [];
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->loadEnv();
    }
    
    /**
     * Load environment variables from .env file
     */
    private function loadEnv() {
        $envFile = __DIR__ . '/../.env';
        
        if (!file_exists($envFile)) {
            throw new Exception('.env file not found. Please create it from .env.example');
        }
        
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Parse key=value pairs
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remove quotes if present
                if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                    (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                    $value = substr($value, 1, -1);
                }
                
                $this->config[$key] = $value;
                
                // Also set as environment variable
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
    
    /**
     * Get configuration value
     */
    public function get($key, $default = null) {
        return $this->config[$key] ?? $default;
    }
    
    /**
     * Get database configuration
     */
    public function getDatabaseConfig() {
        return [
            'host' => $this->get('DB_HOST', 'localhost'),
            'dbname' => $this->get('DB_NAME'),
            'username' => $this->get('DB_USER'),
            'password' => $this->get('DB_PASS'),
            'charset' => 'utf8mb4'
        ];
    }
    
    /**
     * Get security configuration
     */
    public function getSecurityConfig() {
        return [
            'app_secret' => $this->get('APP_SECRET'),
            'jwt_secret' => $this->get('JWT_SECRET'),
            'session_lifetime' => (int)$this->get('SESSION_LIFETIME', 3600),
            'cookie_secure' => $this->get('COOKIE_SECURE', 'false') === 'true',
            'cookie_httponly' => $this->get('COOKIE_HTTPONLY', 'true') === 'true'
        ];
    }
    
    /**
     * Get rate limiting configuration
     */
    public function getRateLimitConfig() {
        return [
            'max_attempts' => (int)$this->get('MAX_LOGIN_ATTEMPTS', 5),
            'window_time' => (int)$this->get('WINDOW_TIME', 900),
            'lockout_time' => (int)$this->get('LOCKOUT_TIME', 900)
        ];
    }
    
    /**
     * Check if environment is development
     */
    public function isDevelopment() {
        return $this->get('APP_ENV', 'production') === 'development';
    }
    
    /**
     * Check if debug mode is enabled
     */
    public function isDebug() {
        return $this->get('DEBUG', 'false') === 'true';
    }
}
