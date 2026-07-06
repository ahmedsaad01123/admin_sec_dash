<?php
/**
 * User Controller - Thin Controller Pattern
 * Only handles HTTP requests/responses
 */
class UserController {
    private $userService;
    
    public function __construct($userService) {
        $this->userService = $userService;
    }
    
    /**
     * Get all users
     */
    public function index() {
        $page = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 50;
        
        try {
            $result = $this->userService->getAllUsers($page, $limit);
            return [
                'success' => true,
                'data' => $result
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Get user by ID
     */
    public function show($id) {
        try {
            $user = $this->userService->getUserById($id);
            return [
                'success' => true,
                'data' => $user
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Update user profile
     */
    public function update($id) {
        $data = $this->getJsonInput();
        
        try {
            $user = $this->userService->updateProfile($id, $data);
            return [
                'success' => true,
                'data' => $user,
                'message' => 'Profile updated successfully'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Update user role
     */
    public function updateRole($id) {
        $data = $this->getJsonInput();
        $newRole = $data['role'] ?? '';
        
        try {
            $this->userService->updateUserRole($id, $newRole);
            return [
                'success' => true,
                'message' => 'User role updated successfully'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Toggle user status
     */
    public function toggleStatus($id) {
        $data = $this->getJsonInput();
        $isActive = $data['is_active'] ?? false;
        
        try {
            $this->userService->toggleUserStatus($id, $isActive);
            return [
                'success' => true,
                'message' => 'User status updated successfully'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Delete user
     */
    public function delete($id) {
        try {
            $this->userService->deleteUser($id);
            return [
                'success' => true,
                'message' => 'User deleted successfully'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Search users
     */
    public function search() {
        $query = $_GET['q'] ?? '';
        $page = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 50;
        
        try {
            $result = $this->userService->searchUsers($query, $page, $limit);
            return [
                'success' => true,
                'data' => $result
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Get user statistics
     */
    public function statistics() {
        try {
            $stats = $this->userService->getUserStatistics();
            return [
                'success' => true,
                'data' => $stats
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Get JSON input from request
     */
    private function getJsonInput() {
        $input = file_get_contents('php://input');
        return json_decode($input, true) ?? [];
    }
}
?>
