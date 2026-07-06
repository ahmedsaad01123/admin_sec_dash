<?php
/**
 * Remember Me Middleware
 * Handles automatic login from remember cookies
 */
class RememberMeMiddleware {
    private $userModel;
    private $authService;
    
    public function __construct($userModel, $authService) {
        $this->userModel = $userModel;
        $this->authService = $authService;
    }
    
    /**
     * Handle remember me functionality
     */
    public function handle() {
        // Only process if user is not already logged in
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        
        // Check for remember token cookie
        if (!isset($_COOKIE['remember_token'])) {
            return true;
        }
        
        try {
            // Find user by remember token
            $user = $this->userModel->findByRememberToken($_COOKIE['remember_token']);
            
            if (!$user) {
                // Invalid token - clear cookie
                $this->clearRememberCookie();
                return true;
            }
            
            // Token is valid - log user in
            session_regenerate_id(true);
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login_time'] = time();
            $_SESSION['remembered'] = true;
            
            // Generate new remember token for security
            $newToken = bin2hex(random_bytes(32));
            $expiry = time() + (30 * 24 * 60 * 60); // 30 days
            
            $this->userModel->updateRememberToken($user['id'], $newToken, date('Y-m-d H:i:s', $expiry));
            setcookie('remember_token', $newToken, $expiry, '/', '', true, true);
            
            return true;
            
        } catch (Exception $e) {
            // Error occurred - clear cookie
            $this->clearRememberCookie();
            return true;
        }
    }
    
    /**
     * Clear remember cookie
     */
    private function clearRememberCookie() {
        setcookie('remember_token', '', time() - 3600, '/', '', true, true);
        unset($_COOKIE['remember_token']);
    }
    
    /**
     * Clear remember token for user
     */
    public function clearUserRememberToken($userId) {
        $this->userModel->clearRememberToken($userId);
        $this->clearRememberCookie();
    }
}
?>
