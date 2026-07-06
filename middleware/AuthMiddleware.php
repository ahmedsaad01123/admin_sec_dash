<?php
/**
 * Authentication Middleware
 * Protects routes that require authentication
 */
class AuthMiddleware {
    private $authService;
    
    public function __construct($authService) {
        $this->authService = $authService;
    }
    
    /**
     * Handle authentication check
     */
    public function handle() {
        if (!$this->authService->isAuthenticated()) {
            // Store intended URL for redirect after login
            $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
            
            // Redirect to login
            header('Location: /login');
            exit;
        }
        
        // Check if user is active
        $user = $this->authService->getCurrentUser();
        if (!$user || !$user['is_active']) {
            $this->authService->logout();
            header('Location: /login?error=account_disabled');
            exit;
        }
        
        return true;
    }
}
?>
