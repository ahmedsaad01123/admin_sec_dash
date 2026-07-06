-- Database Schema Template for Secure MVC System
-- This file will be processed by install.php to replace placeholders
-- Includes all security features and rate limiting
-- MariaDB Compatible

-- Database name will be replaced from .env DB_NAME
CREATE DATABASE IF NOT EXISTS {{DB_NAME}} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE {{DB_NAME}};

-- Users table with proper lockout mechanism
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user', 'moderator') DEFAULT 'user',
    is_active BOOLEAN DEFAULT TRUE,
    email_verified BOOLEAN DEFAULT FALSE,
    last_login TIMESTAMP NULL,
    locked_until TIMESTAMP NULL,
    remember_token VARCHAR(64) NULL,
    remember_expiry DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_username (username),
    INDEX idx_email (email),
    INDEX idx_last_login (last_login),
    INDEX idx_created_at (created_at),
    INDEX idx_locked_until (locked_until),
    INDEX idx_remember_token (remember_token),
    INDEX idx_remember_expiry (remember_expiry)
);

-- Login attempts table for rate limiting
CREATE TABLE IF NOT EXISTS login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identifier VARCHAR(100) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT,
    attempt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    success BOOLEAN DEFAULT FALSE,
    
    INDEX idx_identifier (identifier),
    INDEX idx_ip_address (ip_address),
    INDEX idx_attempt_time (attempt_time),
    INDEX idx_success (success)
);

-- Activity logs table for audit trail
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    action VARCHAR(50) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_user_id (user_id),
    INDEX idx_action (action),
    INDEX idx_created_at (created_at),
    INDEX idx_ip_address (ip_address),
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Password reset tokens table
CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    token VARCHAR(64) UNIQUE NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_token (token),
    INDEX idx_user_id (user_id),
    INDEX idx_expires_at (expires_at),
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Session management table (optional, for enhanced security)
CREATE TABLE IF NOT EXISTS user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    session_id VARCHAR(255) UNIQUE NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_session_id (session_id),
    INDEX idx_user_id (user_id),
    INDEX idx_expires_at (expires_at),
    INDEX idx_ip_address (ip_address),
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert default admin user (password will be hashed by install script)
INSERT INTO users (username, email, password, full_name, role, is_active, email_verified) 
VALUES ('admin', 'admin@example.com', '{{ADMIN_PASSWORD}}', 'System Administrator', 'admin', TRUE, TRUE)
ON DUPLICATE KEY UPDATE password = VALUES(password);

-- Insert default regular user (password will be hashed by install script)
INSERT INTO users (username, email, password, full_name, role, is_active, email_verified) 
VALUES ('user', 'user@example.com', '{{USER_PASSWORD}}', 'Regular User', 'user', TRUE, TRUE)
ON DUPLICATE KEY UPDATE password = VALUES(password);

-- Create view for active users
CREATE OR REPLACE VIEW active_users AS
SELECT id, username, email, full_name, role, last_login, created_at
FROM users 
WHERE is_active = TRUE AND locked_until IS NULL OR locked_until < NOW();

-- Create view for recent login attempts
CREATE OR REPLACE VIEW recent_login_attempts AS
SELECT identifier, ip_address, success, attempt_time
FROM login_attempts 
WHERE attempt_time > DATE_SUB(NOW(), INTERVAL 24 HOUR)
ORDER BY attempt_time DESC;

-- Create view for user activity summary
CREATE OR REPLACE VIEW user_activity_summary AS
SELECT 
    u.id,
    u.username,
    u.full_name,
    u.role,
    COUNT(al.id) as activity_count,
    MAX(al.created_at) as last_activity
FROM users u
LEFT JOIN activity_logs al ON u.id = al.user_id
WHERE u.is_active = TRUE
GROUP BY u.id, u.username, u.full_name, u.role;

-- Rate limit violations table
CREATE TABLE IF NOT EXISTS rate_limit_violations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    identifier VARCHAR(100) NOT NULL,
    violation_type ENUM('login', 'api', 'general') NOT NULL,
    violation_count INT DEFAULT 1,
    first_violation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_violation TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_blocked BOOLEAN DEFAULT FALSE,
    blocked_until TIMESTAMP NULL,
    
    INDEX idx_ip_address (ip_address),
    INDEX idx_identifier (identifier),
    INDEX idx_violation_type (violation_type),
    INDEX idx_last_violation (last_violation),
    INDEX idx_is_blocked (is_blocked),
    INDEX idx_blocked_until (blocked_until),
    INDEX idx_composite (ip_address, identifier, violation_type)
);

-- Security events table
CREATE TABLE IF NOT EXISTS security_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_type ENUM('login_success', 'login_failure', 'logout', 'password_change', 'account_locked', 'account_unlocked', 'suspicious_activity', 'security_violation') NOT NULL,
    user_id INT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT,
    description TEXT,
    severity ENUM('low', 'medium', 'high', 'critical') DEFAULT 'medium',
    is_resolved BOOLEAN DEFAULT FALSE,
    resolved_at TIMESTAMP NULL,
    resolved_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_event_type (event_type),
    INDEX idx_user_id (user_id),
    INDEX idx_ip_address (ip_address),
    INDEX idx_severity (severity),
    INDEX idx_created_at (created_at),
    INDEX idx_is_resolved (is_resolved),
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (resolved_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Create view for security violations
CREATE OR REPLACE VIEW security_summary AS
SELECT 
    se.event_type,
    se.severity,
    COUNT(se.id) as event_count,
    MAX(se.created_at) as last_event,
    u.username as reported_by
FROM security_events se
LEFT JOIN users u ON se.user_id = u.id
WHERE se.is_resolved = FALSE
GROUP BY se.event_type, se.severity, u.username
ORDER BY se.severity DESC, se.created_at DESC;

-- Create cleanup event for expired sessions
CREATE EVENT IF NOT EXISTS cleanup_expired_sessions
ON SCHEDULE EVERY 1 HOUR
STARTS CURRENT_TIMESTAMP
ON COMPLETION NOT PRESERVE
ENABLE
DO BEGIN
    DELETE FROM user_sessions WHERE expires_at < NOW();
    INSERT INTO activity_logs (user_id, action, description, ip_address, user_agent)
    VALUES (NULL, 'system_cleanup', 'Expired sessions cleaned up', 'system', 'system');
END;

-- Create password_resets table
CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL UNIQUE,
    expires_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    used BOOLEAN DEFAULT FALSE,
    ip_address VARCHAR(45),
    user_agent TEXT,
    INDEX idx_email (email),
    INDEX idx_token (token),
    INDEX idx_expires (expires_at)
);
