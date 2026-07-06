<?php
/**
 * User Service Layer
 * Handles all user-related business logic
 */
class UserService {
    private $userModel;
    private $security;
    
    public function __construct($userModel, $security) {
        $this->userModel = $userModel;
        $this->security = $security;
    }
    
    /**
     * Get user by ID
     */
    public function getUserById($id) {
        $user = $this->userModel->findById($id);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        // Remove sensitive data
        unset($user['password']);
        return $user;
    }
    
    /**
     * Get all users with pagination
     */
    public function getAllUsers($page = 1, $limit = 50) {
        $offset = ($page - 1) * $limit;
        
        $users = $this->userModel->getAll($limit, $offset);
        $total = $this->userModel->count();
        
        // Remove sensitive data
        foreach ($users as &$user) {
            unset($user['password']);
        }
        
        return [
            'users' => $users,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'total_pages' => ceil($total / $limit)
        ];
    }
    
    /**
     * Update user profile
     */
    public function updateProfile($userId, $data) {
        // Validate data
        $this->validateProfileData($data);
        
        // Check if user exists
        $user = $this->userModel->findById($userId);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        // Check if email is being changed and if it's already taken
        if (isset($data['email']) && $data['email'] !== $user['email']) {
            $existing = $this->userModel->findByUsernameOrEmail($data['email']);
            if ($existing) {
                throw new Exception('Email already exists');
            }
        }
        
        // Remove sensitive fields that shouldn't be updated here
        unset($data['password'], $data['role'], $data['is_active']);
        
        return $this->userModel->update($userId, $data);
    }
    
    /**
     * Update user role
     */
    public function updateUserRole($userId, $newRole) {
        $validRoles = ['user', 'admin', 'moderator'];
        
        if (!in_array($newRole, $validRoles)) {
            throw new Exception('Invalid role');
        }
        
        $user = $this->userModel->findById($userId);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        return $this->userModel->updateRole($userId, $newRole);
    }
    
    /**
     * Activate/Deactivate user
     */
    public function toggleUserStatus($userId, $isActive) {
        $user = $this->userModel->findById($userId);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        return $this->userModel->updateStatus($userId, $isActive);
    }
    
    /**
     * Delete user
     */
    public function deleteUser($userId) {
        $user = $this->userModel->findById($userId);
        if (!$user) {
            throw new Exception('User not found');
        }
        
        // Don't allow deletion of the last admin
        if ($user['role'] === 'admin') {
            $adminCount = $this->userModel->countByRole('admin');
            if ($adminCount <= 1) {
                throw new Exception('Cannot delete the last admin user');
            }
        }
        
        return $this->userModel->delete($userId);
    }
    
    /**
     * Search users
     */
    public function searchUsers($query, $page = 1, $limit = 50) {
        if (strlen($query) < 2) {
            throw new Exception('Search query must be at least 2 characters');
        }
        
        $offset = ($page - 1) * $limit;
        
        $users = $this->userModel->search($query, $limit, $offset);
        $total = $this->userModel->searchCount($query);
        
        // Remove sensitive data
        foreach ($users as &$user) {
            unset($user['password']);
        }
        
        return [
            'users' => $users,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'total_pages' => ceil($total / $limit),
            'query' => $query
        ];
    }
    
    /**
     * Get user statistics
     */
    public function getUserStatistics() {
        return [
            'total_users' => $this->userModel->count(),
            'active_users' => $this->userModel->countByStatus(true),
            'inactive_users' => $this->userModel->countByStatus(false),
            'users_by_role' => [
                'admin' => $this->userModel->countByRole('admin'),
                'moderator' => $this->userModel->countByRole('moderator'),
                'user' => $this->userModel->countByRole('user')
            ],
            'recent_registrations' => $this->userModel->getRecentRegistrations(7),
            'login_activity' => $this->userModel->getLoginActivity(7)
        ];
    }
    
    /**
     * Validate profile data
     */
    private function validateProfileData($data) {
        if (isset($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }
        
        if (isset($data['full_name']) && strlen(trim($data['full_name'])) < 2) {
            throw new Exception('Full name must be at least 2 characters');
        }
        
        if (isset($data['username'])) {
            if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $data['username'])) {
                throw new Exception('Username must be 3-20 characters, alphanumeric and underscore only');
            }
        }
    }
}
?>
