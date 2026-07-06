<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function findByUsernameOrEmail($identifier) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
        return $this->db->fetch($sql, [$identifier, $identifier]);
    }
    
    public function findById($id) {
        $sql = "SELECT id, username, email, full_name, role, created_at, updated_at 
                FROM users WHERE id = ? LIMIT 1";
        return $this->db->fetch($sql, [$id]);
    }
    
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        return $this->db->fetch($sql, [$email]);
    }
    
    public function create($data) {
        $data['password'] = Security::getInstance()->hashPassword($data['password']);
        $data['created_at'] = date('Y-m-d H:i:s');
        
        return $this->db->insert('users', $data);
    }
    
    public function updateLastLogin($id) {
        $sql = "UPDATE users SET last_login = NOW() WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
    
    public function updatePassword($id, $newPassword) {
        $hashedPassword = Security::getInstance()->hashPassword($newPassword);
        $sql = "UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?";
        return $this->db->query($sql, [$hashedPassword, $id]);
    }
    
    public function getAll($limit = 50, $offset = 0) {
        $sql = "SELECT id, username, email, full_name, role, created_at, last_login 
                FROM users 
                ORDER BY created_at DESC 
                LIMIT ? OFFSET ?";
        return $this->db->fetchAll($sql, [$limit, $offset]);
    }
    
    public function count() {
        $sql = "SELECT COUNT(*) as total FROM users";
        $result = $this->db->fetch($sql);
        return $result['total'] ?? 0;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
    
    public function updateRememberToken($userId, $token, $expiry) {
        $sql = "UPDATE users SET remember_token = ?, remember_expiry = ? WHERE id = ?";
        return $this->db->query($sql, [$token, $expiry, $userId]);
    }
    
    public function findByRememberToken($token) {
        $sql = "SELECT * FROM users WHERE remember_token = ? AND remember_expiry > NOW() LIMIT 1";
        return $this->db->fetch($sql, [$token]);
    }
    
    public function clearRememberToken($userId) {
        $sql = "UPDATE users SET remember_token = NULL, remember_expiry = NULL WHERE id = ?";
        return $this->db->query($sql, [$userId]);
    }
    
    public function update($id, $data) {
        if (isset($data['password'])) {
            $data['password'] = Security::getInstance()->hashPassword($data['password']);
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        return $this->db->update('users', $data, 'id = ?', [$id]);
    }
}
