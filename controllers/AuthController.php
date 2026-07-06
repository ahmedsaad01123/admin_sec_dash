<?php
require_once __DIR__ . '/../services/AuthService.php';
require_once __DIR__ . '/../core/Security.php';
require_once __DIR__ . '/../core/PasswordPolicy.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/Request.php';
require_once __DIR__ . '/../core/Response.php';

class AuthController {
    private $authService;
    private $security;
    private $user;
    private $passwordPolicy;
    private $request;
    
    public function __construct($authService = null) {
        if ($authService) {
            $this->authService = $authService;
        } else {
            // Fallback for backward compatibility
            $this->security = Security::getInstance();
            $this->user = new User();
            $this->passwordPolicy = PasswordPolicy::getInstance();
            $this->authService = new AuthService($this->user, $this->security, RateLimiter::getInstance());
        }
        
        $this->request = new Request();
    }
    
    public function showLogin() {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit();
        }
        
        $this->authService->getSecurity()->setSecurityHeaders();
        $csrfToken = $this->authService->generateCSRFToken();
        
        // Set variables for view
        $csrf_token_name = 'csrf_token';
        
        require_once __DIR__ . '/../views/auth/login.php';
    }
    
    /**
     * Login user - Hybrid (JSON + HTML)
     */
    public function login() {
        $data = $this->request->all();
        
        try {
            // Validate input
            $this->validateLoginInput($data);
            
            // Authenticate user
            $user = $this->authService->login($data['username'], $data['password'], $_SERVER['REMOTE_ADDR']);
            
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);
            
            // Set session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login_time'] = time();
            
            // Handle "Remember Me" functionality
            if (isset($data['remember']) && $data['remember'] === 'on') {
                // Set remember token
                $rememberToken = bin2hex(random_bytes(32));
                $expiry = time() + (30 * 24 * 60 * 60); // 30 days
                
                // Store remember token in database
                $this->user->updateRememberToken($user['id'], $rememberToken, date('Y-m-d H:i:s', $expiry));
                
                // Set secure remember cookie
                setcookie('remember_token', $rememberToken, $expiry, '/', '', true, true);
            }
            
            // Prepare response data
            $responseData = [
                'user' => [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'full_name' => $user['full_name'],
                    'role' => $user['role']
                ],
                'session' => [
                    'login_time' => $_SESSION['login_time'],
                    'csrf_token' => $this->authService->generateCSRFToken()
                ]
            ];
            
            // Return JSON for API requests, redirect for web requests
            if ($this->request->isAjax() || $this->request->wantsJson()) {
                Response::json($responseData, 200);
            } else {
                // Web request - redirect to dashboard
                Response::redirect('/dashboard');
            }
            
        } catch (Exception $e) {
            $error = $e->getMessage();
            
            // Log failed login attempt
            $this->logActivity(null, 'login_failed', $error . ' - Username: ' . ($data['username'] ?? 'unknown'));
            
            // Return error response
            $errorData = [
                'error' => $error,
                'csrf_token' => $this->authService->generateCSRFToken()
            ];
            
            if ($this->request->isAjax() || $this->request->wantsJson()) {
                Response::error($error, 401, 'AUTH_FAILED');
            } else {
                // Web request - set error in session and show login page
                $_SESSION['error'] = $error;
                $csrfToken = $this->authService->generateCSRFToken();
                require_once __DIR__ . '/../views/auth/login.php';
            }
        }
    }
    
    /**
     * Validate login input
     */
    private function validateLoginInput($data) {
        if (empty($data['username']) || empty($data['password'])) {
            throw new Exception('Username and password are required');
        }
        
        if (empty($data['csrf_token'])) {
            throw new Exception('CSRF token is required');
        }
        
        // Validate CSRF token
        if (!$this->authService->getSecurity()->verifyCSRFToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }
    }
    
    public function logout() {
        // Log logout before destroying session
        $userId = $_SESSION['user_id'] ?? null;
        if ($userId) {
            $this->logActivity($userId, 'logout', 'User logged out');
        }
        
        // Clear remember token from database
        if ($userId) {
            $this->user->clearRememberToken($userId);
        }
        
        // Clear remember cookie
        setcookie('remember_token', '', time() - 3600, '/', '', true, true);
        unset($_COOKIE['remember_token']);
        
        // Use authService logout
        $this->authService->logout();
        
        // Redirect to login
        if ($this->request->isAjax() || $this->request->wantsJson()) {
            Response::json(['message' => 'Logged out successfully'], 200);
        } else {
            Response::redirect('/login');
        }
    }
    
    public function showDashboard() {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        // Verify session integrity
        if ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR'] || 
            $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
            session_destroy();
            $_SESSION['error'] = 'Session security violation';
            header('Location: /login');
            exit();
        }
        
        $this->security->setSecurityHeaders();
        
        // Get user data
        $user = $this->user->findById($_SESSION['user_id']);
        
        if (!$user) {
            session_destroy();
            $_SESSION['error'] = 'User not found';
            header('Location: /login');
            exit();
        }
        
        // Get dashboard statistics
        $stats = $this->getDashboardStats();
        
        require_once __DIR__ . '/../views/dashboard/index.php';
    }
    
    private function getDashboardStats() {
        try {
            $db = Database::getInstance();
            
            // Total users
            $totalUsers = $db->fetch("SELECT COUNT(*) as count FROM users")['count'];
            
            // Recent logins (last 24 hours)
            $recentLogins = $db->fetch("
                SELECT COUNT(*) as count 
                FROM users 
                WHERE last_login >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
            ")['count'];
            
            // New users (last 7 days)
            $newUsers = $db->fetch("
                SELECT COUNT(*) as count 
                FROM users 
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            ")['count'];
            
            // System uptime (placeholder)
            $uptime = '99.9%';
            
            return [
                'total_users' => $totalUsers,
                'recent_logins' => $recentLogins,
                'new_users' => $newUsers,
                'uptime' => $uptime
            ];
            
        } catch (Exception $e) {
            error_log("Dashboard stats error: " . $e->getMessage());
            return [
                'total_users' => 0,
                'recent_logins' => 0,
                'new_users' => 0,
                'uptime' => 'N/A'
            ];
        }
    }
    
    /**
     * Show forgot password form
     */
    public function showForgotPassword() {
        $this->authService->getSecurity()->setSecurityHeaders();
        $csrfToken = $this->authService->generateCSRFToken();
        require_once __DIR__ . '/../views/auth/forgot-password.php';
    }
    
    /**
     * Handle forgot password request
     */
    public function forgotPassword() {
        $data = $this->request->all();
        
        try {
            // Validate input
            $this->validateForgotPasswordInput($data);
            
            // Check rate limiting
            $rateLimiter = RateLimiter::getInstance();
            $result = $rateLimiter->checkRateLimit('forgot_password', $_SERVER['REMOTE_ADDR'], 'api');
            
            if (!$result['allowed']) {
                throw new Exception('Too many password reset requests. Please try again later.');
            }
            
            // Generate reset token
            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', time() + 900); // 15 minutes
            
            // Store reset request
            $db = Database::getInstance();
            $resetData = [
                'email' => $data['email'],
                'token' => $token,
                'expires_at' => $expiresAt,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            ];
            
            $db->insert('password_resets', $resetData);
            
            // Log activity
            $this->logActivity(null, 'password_reset_requested', 'Password reset requested for: ' . $data['email']);
            
            // Set success message
            $_SESSION['success'] = 'تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني.';
            
            // Redirect back to forgot password form
            header('Location: /forgot-password');
            exit();
            
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $csrfToken = $this->authService->generateCSRFToken();
            require_once __DIR__ . '/../views/auth/forgot-password.php';
        }
    }
    
    /**
     * Show reset password form
     */
    public function showResetPassword($token) {
        $this->authService->getSecurity()->setSecurityHeaders();
        $csrfToken = $this->authService->generateCSRFToken();
        
        // Validate token
        $db = Database::getInstance();
        $reset = $db->fetch(
            "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW() AND used = FALSE",
            [$token]
        );
        
        if (!$reset) {
            $_SESSION['error'] = 'رابط إعادة تعيين كلمة المرور غير صالح أو منتهي الصلاحية.';
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/auth/reset-password.php';
    }
    
    /**
     * Handle reset password
     */
    public function resetPassword() {
        $data = $this->request->all();
        
        try {
            // Validate input
            $this->validateResetPasswordInput($data);
            
            // Get reset request
            $db = Database::getInstance();
            $reset = $db->fetch(
                "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW() AND used = FALSE",
                [$data['token']]
            );
            
            if (!$reset) {
                throw new Exception('رابط إعادة تعيين كلمة المرور غير صالح أو منتهي الصلاحية.');
            }
            
            // Find user by email
            $user = $this->user->findByEmail($reset['email']);
            if (!$user) {
                throw new Exception('المستخدم غير موجود.');
            }
            
            // Hash new password
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            
            // Update user password
            $db->update(
                'users',
                ['password' => $hashedPassword, 'updated_at' => date('Y-m-d H:i:s')],
                'id = ?',
                [$user['id']]
            );
            
            // Mark token as used
            $db->update(
                'password_resets',
                ['used' => TRUE],
                'id = ?',
                [$reset['id']]
            );
            
            // Log activity
            $this->logActivity($user['id'], 'password_reset', 'Password reset completed');
            
            // Set success message
            $_SESSION['success'] = 'تم تعيين كلمة المرور الجديدة بنجاح. يمكنك الآن تسجيل الدخول.';
            
            // Redirect to login
            header('Location: /login');
            exit();
            
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $csrfToken = $this->authService->generateCSRFToken();
            $token = $data['token'] ?? '';
            require_once __DIR__ . '/../views/auth/reset-password.php';
        }
    }
    
    /**
     * Validate forgot password input
     */
    private function validateForgotPasswordInput($data) {
        if (empty($data['email'])) {
            throw new Exception('البريد الإلكتروني مطلوب.');
        }
        
        if (empty($data['csrf_token'])) {
            throw new Exception('CSRF token is required');
        }
        
        if (!$this->authService->getSecurity()->verifyCSRFToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('البريد الإلكتروني غير صالح.');
        }
    }
    
    /**
     * Validate reset password input
     */
    private function validateResetPasswordInput($data) {
        if (empty($data['password']) || empty($data['confirm_password'])) {
            throw new Exception('كلمة المرور وتأكيدها مطلوبان.');
        }
        
        if (empty($data['csrf_token'])) {
            throw new Exception('CSRF token is required');
        }
        
        if (!$this->authService->getSecurity()->verifyCSRFToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }
        
        if (strlen($data['password']) < 8) {
            throw new Exception('كلمة المرور يجب أن تكون 8 أحرف على الأقل.');
        }
        
        if ($data['password'] !== $data['confirm_password']) {
            throw new Exception('كلمات المرور غير متطابقة.');
        }
        
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/', $data['password'])) {
            throw new Exception('كلمة المرور يجب أن تحتوي على حرف صغير، حرف كبير، رقم، ورمز خاص.');
        }
    }
    
    private function logActivity($userId, $action, $description) {
        try {
            $db = Database::getInstance();
            
            $logData = [
                'user_id' => $userId,
                'action' => $action,
                'description' => $description,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $db->insert('activity_logs', $logData);
            
        } catch (Exception $e) {
            error_log("Activity log error: " . $e->getMessage());
        }
    }
}
