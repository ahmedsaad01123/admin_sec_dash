<?php
/**
 * Complete Install Script - All Tables Included
 * Fixed version with all required tables
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// HTML header
echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تثبيت شامل</title>
    <style>
        body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); margin: 0; padding: 20px; min-height: 100vh; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 40px; }
        .logo { width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold; margin: 0 auto 20px; }
        h1 { color: #333; margin-bottom: 10px; }
        .success { color: #155724; background: #d4edda; padding: 15px; border-radius: 8px; margin: 10px 0; border-left: 4px solid #28a745; }
        .error { color: #721c24; background: #f8d7da; padding: 15px; border-radius: 8px; margin: 10px 0; border-left: 4px solid #dc3545; }
        .info { color: #0c5460; background: #d1ecf1; padding: 15px; border-radius: 8px; margin: 10px 0; border-left: 4px solid #17a2b8; }
        h2 { color: #666; border-bottom: 3px solid #007bff; padding-bottom: 8px; margin: 30px 0 15px 0; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: right; }
        th { background: #f8f9fa; font-weight: bold; color: #495057; }
        .btn { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; display: inline-block; margin: 10px 5px; transition: transform 0.2s; font-weight: bold; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .progress { background: #e9ecef; border-radius: 10px; height: 8px; margin: 20px 0; overflow: hidden; }
        .progress-bar { background: linear-gradient(45deg, #667eea, #764ba2); height: 100%; transition: width 0.3s ease; }
        .step { margin: 20px 0; padding: 20px; background: #f8f9fa; border-radius: 10px; border-left: 4px solid #007bff; }
        .step.success { border-left-color: #28a745; background: #d4edda; }
        .step.error { border-left-color: #dc3545; background: #f8d7da; }
        .step h3 { margin-top: 0; color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">S</div>
            <h1>نظام المصادقة الآمن - التثبيت الشامل</h1>
            <p style="color: #666;">الإصدار 2.1 - مع جميع الجداول المطلوبة</p>
        </div>';

// Step 1: Check requirements
echo '<div class="step">
        <h3>الخطوة 1: فحص المتطلبات</h3>';

if (version_compare(PHP_VERSION, '7.4', '>=')) {
    echo '<div class="success">✅ PHP Version: ' . PHP_VERSION . '</div>';
} else {
    echo '<div class="error">❌ PHP Version ' . PHP_VERSION . ' (7.4+ required)</div>';
}

$required = ['pdo', 'pdo_mysql', 'json', 'openssl', 'mbstring'];
$missing = [];
foreach ($required as $ext) {
    if (extension_loaded($ext)) {
        echo '<div class="success">✅ Extension: ' . $ext . '</div>';
    } else {
        echo '<div class="error">❌ Extension: ' . $ext . '</div>';
        $missing[] = $ext;
    }
}

if (!empty($missing)) {
    echo '<div class="error">❌ Extensions missing: ' . implode(', ', $missing) . '</div>';
}

echo '</div>';

// Step 2: Load configuration
echo '<div class="step">
        <h3>الخطوة 2: تحميل الإعدادات</h3>';

$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    echo '<div class="success">✅ .env file found</div>';
    
    $config = [];
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $config[trim($key)] = trim($value);
        }
    }
    
    echo '<table>
            <tr><th>المعلمة</th><th>القيمة</th></tr>
            <tr><td>DB_HOST</td><td>' . htmlspecialchars($config['DB_HOST'] ?? 'N/A') . '</td></tr>
            <tr><td>DB_NAME</td><td>' . htmlspecialchars($config['DB_NAME'] ?? 'N/A') . '</td></tr>
            <tr><td>DB_USER</td><td>' . htmlspecialchars($config['DB_USER'] ?? 'N/A') . '</td></tr>
            <tr><td>DB_PASS</td><td>' . (!empty($config['DB_PASS']) ? '***' : '(فارغ)') . '</td></tr>
          </table>';
} else {
    echo '<div class="error">❌ .env file not found</div>';
}

echo '</div>';

// Step 3: Database connection and setup
echo '<div class="step">
        <h3>الخطوة 3: إعداد قاعدة البيانات</h3>';

if (isset($config) && empty($missing)) {
    try {
        $dsn = "mysql:host={$config['DB_HOST']};charset=utf8mb4";
        $pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        echo '<div class="success">✅ Database connection successful</div>';
        
        // Create database
        $dbName = $config['DB_NAME'] ?? 'tamkeen_admin_secure';
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . $dbName . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo '<div class="success">✅ Database "' . htmlspecialchars($dbName) . '" created/verified</div>';
        
        // Switch to the database
        $pdo->exec("USE `" . $dbName . "`");
        
        // Load Security class
        require_once __DIR__ . '/../core/Security.php';
        
        echo '<h4>إنشاء الجداول:</h4>';
        
        // 1. Users table
        $pdo->exec("
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
                INDEX idx_locked_until (locked_until),
                INDEX idx_remember_token (remember_token),
                INDEX idx_remember_expiry (remember_expiry)
            )
        ");
        echo '<div class="success">✅ Users table created</div>';
        
        // 2. Rate limits table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS rate_limits (
                id INT AUTO_INCREMENT PRIMARY KEY,
                ip_address VARCHAR(45) NOT NULL,
                identifier VARCHAR(100) NOT NULL,
                attempt_count INT DEFAULT 1,
                window_start TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                is_locked BOOLEAN DEFAULT FALSE,
                locked_until TIMESTAMP NULL,
                
                INDEX idx_ip_address (ip_address),
                INDEX idx_identifier (identifier),
                INDEX idx_window_start (window_start),
                INDEX idx_is_locked (is_locked),
                INDEX idx_locked_until (locked_until),
                UNIQUE KEY unique_rate_limit (ip_address, identifier, window_start)
            )
        ");
        echo '<div class="success">✅ Rate limits table created</div>';
        
        // 3. Login attempts table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Login attempts table created</div>';
        
        // 4. Activity logs table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Activity logs table created</div>';
        
        // 5. Password reset tokens table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Password reset tokens table created</div>';
        
        // 6. User sessions table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ User sessions table created</div>';
        
        // 7. Rate limit violations table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Rate limit violations table created</div>';
        
        // 8. Security events table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Security events table created</div>';
        
        // 9. Create cleanup event
        $pdo->exec("
            CREATE EVENT IF NOT EXISTS cleanup_expired_sessions
            ON SCHEDULE EVERY 1 HOUR
            STARTS CURRENT_TIMESTAMP
            ON COMPLETION NOT PRESERVE
            ENABLE
            DO BEGIN
                DELETE FROM user_sessions WHERE expires_at < NOW();
                INSERT INTO activity_logs (user_id, action, description, ip_address, user_agent)
                VALUES (NULL, 'system_cleanup', 'Expired sessions cleaned up', 'system', 'system');
            END
        ");
        echo '<div class="success">✅ Cleanup event created</div>';
        
        // 10. Password resets table
        $pdo->exec("
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
            )
        ");
        echo '<div class="success">✅ Password resets table created</div>';
        
        // Step 4: Create default users
        echo '<h4>إنشاء المستخدمين الافتراضيين:</h4>';
        
        $adminPassword = Security::getInstance()->hashPassword('Admin123!@#');
        $userPassword = Security::getInstance()->hashPassword('User123!@#');
        
        $pdo->exec("
            INSERT INTO users (username, email, password, full_name, role, is_active, email_verified) 
            VALUES ('admin', 'admin@example.com', '{$adminPassword}', 'System Administrator', 'admin', TRUE, TRUE)
            ON DUPLICATE KEY UPDATE password = VALUES(password)
        ");
        echo '<div class="success">✅ Admin user created/updated</div>';
        
        $pdo->exec("
            INSERT INTO users (username, email, password, full_name, role, is_active, email_verified) 
            VALUES ('user', 'user@example.com', '{$userPassword}', 'Regular User', 'user', TRUE, TRUE)
            ON DUPLICATE KEY UPDATE password = VALUES(password)
        ");
        echo '<div class="success">✅ Regular user created/updated</div>';
        
        // Show created users
        $users = $pdo->query("SELECT username, email, role FROM users")->fetchAll();
        echo '<h4>المستخدمون الحاليون:</h4>';
        echo '<table>
                <tr><th>اسم المستخدم</th><th>البريد الإلكتروني</th><th>الدور</th></tr>';
        foreach ($users as $user) {
            echo '<tr>
                    <td>' . htmlspecialchars($user['username']) . '</td>
                    <td>' . htmlspecialchars($user['email']) . '</td>
                    <td>' . htmlspecialchars($user['role']) . '</td>
                  </tr>';
        }
        echo '</table>';
        
        // Show all tables
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        echo '<h4>الجداول المنشأة:</h4>';
        echo '<table>
                <tr><th>اسم الجدول</th><th>الحالة</th></tr>';
        foreach ($tables as $table) {
            echo '<tr>
                    <td>' . htmlspecialchars($table) . '</td>
                    <td><span style="color: green;">✅ جاهز</span></td>
                  </tr>';
        }
        echo '</table>';
        
        // Success message
        echo '<div class="success">
                <h2>🎉 تم التثبيت بنجاح!</h2>
                <p><strong>معلومات تسجيل الدخول:</strong></p>
                <ul style="text-align: left; direction: ltr;">
                    <li><strong>المسؤول:</strong> admin / Admin123!@#</li>
                    <li><strong>المستخدم:</strong> user / User123!@#</li>
                </ul>
                <p><strong>الميزات المتاحة:</strong></p>
                <ul>
                    <li>✅ نظام مصادقة آمن</li>
                    <li>✅ حماية من brute force attacks</li>
                    <li>✅ "تذكرني" آمن</li>
                    <li>✅ سجل الأنشطة</li>
                    <li>✅ إعادة تعيين كلمة المرور</li>
                    <li>✅ إدارة الجلسات</li>
                </ul>
                <p><strong>الخطوات التالية:</strong></p>
                <ol>
                    <li>احذف مجلد install بعد الانتهاء</li>
                    <li>غيّر كلمات المرور الافتراضية</li>
                    <li>ابدأ استخدام النظام</li>
                </ol>
                <div style="text-align: center; margin-top: 30px;">
                    <a href="../" class="btn">🚀 الذهاب إلى النظام</a>
                </div>
              </div>';
        
    } catch (PDOException $e) {
        echo '<div class="error">❌ Database error: ' . $e->getMessage() . '</div>';
    } catch (Exception $e) {
        echo '<div class="error">❌ Error: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="error">❌ Cannot proceed - missing requirements or configuration</div>';
}

echo '</div>
</body>
</html>';
?>
