<?php
/**
 * Simple Dependency Injection Container
 */
class Container {
    private static $instance;
    private $bindings = [];
    private $instances = [];
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Bind a class to the container
     */
    public function bind($key, $resolver) {
        $this->bindings[$key] = $resolver;
    }
    
    /**
     * Get an instance from the container
     */
    public function get($key) {
        // Return existing instance if already created
        if (isset($this->instances[$key])) {
            return $this->instances[$key];
        }
        
        // Create new instance
        if (isset($this->bindings[$key])) {
            $instance = $this->bindings[$key]($this);
            $this->instances[$key] = $instance;
            return $instance;
        }
        
        // Try to auto-resolve
        if (class_exists($key)) {
            $instance = new $key();
            $this->instances[$key] = $instance;
            return $instance;
        }
        
        throw new Exception("Unable to resolve dependency: {$key}");
    }
    
    /**
     * Check if a binding exists
     */
    public function has($key) {
        return isset($this->bindings[$key]) || isset($this->instances[$key]);
    }
    
    /**
     * Initialize default bindings
     */
    public function initialize() {
        // Database
        $this->bind('Database', function($container) {
            return Database::getInstance();
        });
        
        // Security
        $this->bind('Security', function($container) {
            return Security::getInstance();
        });
        
        // Rate Limiter
        $this->bind('RateLimiter', function($container) {
            return RateLimiter::getInstance();
        });
        
        // Models
        $this->bind('UserModel', function($container) {
            return new User();
        });
        
        // Services
        $this->bind('AuthService', function($container) {
            return new AuthService(
                $container->get('UserModel'),
                $container->get('Security'),
                $container->get('RateLimiter')
            );
        });
        
        $this->bind('UserService', function($container) {
            return new UserService(
                $container->get('UserModel'),
                $container->get('Security')
            );
        });
        
        // Middleware
        $this->bind('AuthMiddleware', function($container) {
            return new AuthMiddleware($container->get('AuthService'));
        });
        
        $this->bind('AdminMiddleware', function($container) {
            return new AdminMiddleware($container->get('AuthService'));
        });
        
        // Controllers
        $this->bind('AuthController', function($container) {
            return new AuthController($container->get('AuthService'));
        });
        
        $this->bind('UserController', function($container) {
            return new UserController($container->get('UserService'));
        });
    }
}
?>
