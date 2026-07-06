<?php
/**
 * Authentication Service Layer
 * Handles all authentication business logic
 */
class AuthService {
    private $userModel;
    private $security;
    private $rateLimiter;
    
    public function __construct($userModel, $security, $rateLimiter) {
        $this->userModel = $userModel;
        $this->security = $security;
        $this->rateLimiter = $rateLimiter;
    }
    
    /**
     * Authenticate user login
     */
    public function login($username, $password, $ipAddress) {
        // Check rate limiting
        $this->security->checkRateLimit($username, $ipAddress, 'login');
        
        // Find user
        $user = $this->userModel->findByUsernameOrEmail($username);
        
        if (!$user || !$this->security->verifyPassword($password, $user['password'])) {
            throw new Exception('Invalid credentials');
        }
        
        // Successful login - reset rate limit
        $this->security->resetRateLimit($username, $ipAddress);
        
        // Update last login
        $this->userModel->updateLastLogin($user['id']);
        
        return $user;
    }
    
    /**
     * Register new user
     */
    public function register($userData) {
        // Validate input
        $this->validateRegistrationData($userData);
        
        // Check if user exists
        if ($this->userModel->findByUsernameOrEmail($userData['username'])) {
            throw new Exception('Username already exists');
        }
        
        if ($this->userModel->findByUsernameOrEmail($userData['email'])) {
            throw new Exception('Email already exists');
        }
        
        // Apply password policy
        $this->security->getPasswordPolicy()->validate($userData['password'], $userData);
        
        // Create user
        return $this->userModel->create($userData);
    }
    
    /**
     * Change user password
     */
    public function changePassword($userId, $oldPassword, $newPassword) {
        // Get user
        $user = $this->userModel->findById($userId);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        // Verify old password
        if (!$this->security->verifyPassword($oldPassword, $user['password'])) {
            throw new Exception('Current password is incorrect');
        }
        
        // Apply password policy
        $this->security->getPasswordPolicy()->validate($newPassword, $user);
        
        // Update password
        return $this->userModel->updatePassword($userId, $newPassword);
    }
    
    /**
     * Reset password
     */
    public function resetPassword($email) {
        $user = $this->userModel->findByUsernameOrEmail($email);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        // Generate reset token
        $resetToken = bin2hex(random_bytes(32));
        $resetExpiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // Save reset token
        $this->userModel->updateResetToken($user['id'], $resetToken, $resetExpiry);
        
        return $resetToken;
    }
    
    /**
     * Validate registration data
     */
    private function validateRegistrationData($data) {
        $required = ['username', 'email', 'password', 'full_name'];
        
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception(ucfirst($field) . ' is required');
            }
        }
        
        // Validate email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }
        
        // Validate username format
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $data['username'])) {
            throw new Exception('Username must be 3-20 characters, alphanumeric and underscore only');
        }
    }
    
    /**
     * Check if user is authenticated
     */
    public function isAuthenticated() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }
    
    /**
     * Get current authenticated user
     */
    public function getCurrentUser() {
        if (!$this->isAuthenticated()) {
            return null;
        }
        
        return $this->userModel->findById($_SESSION['user_id']);
    }
    
    /**
     * Logout user
     */
    public function logout() {
        session_destroy();
        session_start();
    }
    
    /**
     * Get security instance
     */
    public function getSecurity() {
        return $this->security;
    }
    
    /**
     * Generate CSRF token
     */
    public function generateCSRFToken() {
        return $this->security->generateCSRFToken();
    }
}
?>
