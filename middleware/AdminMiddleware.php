<?php
/**
 * Admin Middleware
 * Protects routes that require admin access
 */
class AdminMiddleware {
    private $authService;
    
    public function __construct($authService) {
        $this->authService = $authService;
    }
    
    /**
     * Handle admin authentication check
     */
    public function handle() {
        // First check if user is authenticated
        $authMiddleware = new AuthMiddleware($this->authService);
        $authMiddleware->handle();
        
        // Check if user has admin role
        $user = $this->authService->getCurrentUser();
        if (!$user || $user['role'] !== 'admin') {
            header('Location: /dashboard?error=access_denied');
            exit;
        }
        
        return true;
    }
}
?>
