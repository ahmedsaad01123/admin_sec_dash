<?php
require_once __DIR__ . '/Config.php';

/**
 * Advanced Password Policy Enforcement
 * Implements strong password requirements and validation
 */
class PasswordPolicy {
    private static $instance = null;
    private $config;
    
    // Default password requirements
    private $minLength = 12;
    private $maxLength = 128;
    private $requireUppercase = true;
    private $requireLowercase = true;
    private $requireNumbers = true;
    private $requireSpecialChars = true;
    private $preventCommonPasswords = true;
    private $preventUserInfo = true;
    private $maxRepeatedChars = 2;
    private $preventSequences = true;
    
    // Common weak passwords to block
    private $commonPasswords = [
        'password', '123456', '123456789', '12345678', '12345', '1234567',
        '1234567890', '1234', 'qwerty', 'abc123', 'password123', 'admin',
        'letmein', 'welcome', 'monkey', 'dragon', 'master', 'sunshine',
        'princess', 'football', 'shadow', 'superman', 'iloveyou', '111111',
        '123123', '654321', '000000', 'qwertyuiop', 'asdfghjkl', 'zxcvbnm',
        '1q2w3e4r', '123qwe', 'qwe123', 'password1', 'admin123', 'root',
        'toor', 'pass', 'test', 'guest', 'user', 'login', 'welcome123'
    ];
    
    // Common sequences to prevent
    private $sequences = [
        '0123456789', 'abcdefghijklmnopqrstuvwxyz', 'qwertyuiop',
        'asdfghjkl', 'zxcvbnm', '12345678', '23456789', '34567890',
        '45678901', '56789012', '67890123', '78901234', '89012345',
        '90123456', '01234567', 'abcdefgh', 'bcdefghi', 'cdefghij',
        'defghijk', 'efghijkl', 'fghijklm', 'ghijklmn', 'hijklmno',
        'ijklmnop', 'jklmnopq', 'klmnopqr', 'lmnopqrs', 'mnopqrst',
        'nopqrstu', 'opqrstuv', 'pqrstuvw', 'qrstuvwx', 'rstuvwxy',
        'stuvwxyz'
    ];
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->config = Config::getInstance();
        $this->loadSettings();
    }
    
    /**
     * Load password policy settings from config
     */
    private function loadSettings() {
        $this->minLength = (int)($this->config->get('PASSWORD_MIN_LENGTH', 12));
        $this->maxLength = (int)($this->config->get('PASSWORD_MAX_LENGTH', 128));
        $this->requireUppercase = $this->config->get('PASSWORD_REQUIRE_UPPERCASE', 'true') === 'true';
        $this->requireLowercase = $this->config->get('PASSWORD_REQUIRE_LOWERCASE', 'true') === 'true';
        $this->requireNumbers = $this->config->get('PASSWORD_REQUIRE_NUMBERS', 'true') === 'true';
        $this->requireSpecialChars = $this->config->get('PASSWORD_REQUIRE_SPECIAL', 'true') === 'true';
        $this->preventCommonPasswords = $this->config->get('PASSWORD_PREVENT_COMMON', 'true') === 'true';
        $this->preventUserInfo = $this->config->get('PASSWORD_PREVENT_USER_INFO', 'true') === 'true';
        $this->maxRepeatedChars = (int)($this->config->get('PASSWORD_MAX_REPEATED', 2));
        $this->preventSequences = $this->config->get('PASSWORD_PREVENT_SEQUENCES', 'true') === 'true';
    }
    
    /**
     * Validate password against policy
     * @param string $password - Password to validate
     * @param array $userInfo - User information (username, email, etc.) for additional checks
     * @return array - ['valid' => bool, 'errors' => array, 'strength' => string]
     */
    public function validate($password, $userInfo = []) {
        $errors = [];
        
        // Length validation
        if (strlen($password) < $this->minLength) {
            $errors[] = "Password must be at least {$this->minLength} characters long";
        }
        
        if (strlen($password) > $this->maxLength) {
            $errors[] = "Password must not exceed {$this->maxLength} characters";
        }
        
        // Character type validation
        if ($this->requireUppercase && !preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter";
        }
        
        if ($this->requireLowercase && !preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter";
        }
        
        if ($this->requireNumbers && !preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one number";
        }
        
        if ($this->requireSpecialChars && !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $errors[] = "Password must contain at least one special character";
        }
        
        // Common password validation
        if ($this->preventCommonPasswords && $this->isCommonPassword($password)) {
            $errors[] = "Password is too common. Please choose a more unique password";
        }
        
        // User info validation
        if ($this->preventUserInfo && $this->containsUserInfo($password, $userInfo)) {
            $errors[] = "Password cannot contain your username, email, or personal information";
        }
        
        // Repeated characters validation
        if ($this->hasTooManyRepeatedChars($password)) {
            $errors[] = "Password cannot contain more than {$this->maxRepeatedChars} repeated characters in a row";
        }
        
        // Sequence validation
        if ($this->preventSequences && $this->containsSequences($password)) {
            $errors[] = "Password cannot contain common sequences (like '123456' or 'qwerty')";
        }
        
        // Calculate password strength
        $strength = $this->calculateStrength($password);
        
        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'strength' => $strength,
            'score' => $this->getStrengthScore($password)
        ];
    }
    
    /**
     * Check if password is in common passwords list
     */
    private function isCommonPassword($password) {
        $lowerPassword = strtolower($password);
        
        // Direct match
        if (in_array($lowerPassword, $this->commonPasswords)) {
            return true;
        }
        
        // Partial match for variations
        foreach ($this->commonPasswords as $common) {
            if (strpos($lowerPassword, $common) !== false || 
                strpos($common, $lowerPassword) !== false) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Check if password contains user information
     */
    private function containsUserInfo($password, $userInfo) {
        if (empty($userInfo)) {
            return false;
        }
        
        $lowerPassword = strtolower($password);
        
        // Check username
        if (!empty($userInfo['username'])) {
            $username = strtolower($userInfo['username']);
            if (strpos($lowerPassword, $username) !== false || 
                strpos($username, $lowerPassword) !== false) {
                return true;
            }
        }
        
        // Check email parts
        if (!empty($userInfo['email'])) {
            $email = strtolower($userInfo['email']);
            $emailParts = explode('@', $email);
            $emailLocal = $emailParts[0] ?? '';
            $emailDomain = $emailParts[1] ?? '';
            
            if (strpos($lowerPassword, $emailLocal) !== false || 
                strpos($lowerPassword, $emailDomain) !== false) {
                return true;
            }
        }
        
        // Check full name
        if (!empty($userInfo['full_name'])) {
            $nameParts = explode(' ', strtolower($userInfo['full_name']));
            foreach ($nameParts as $namePart) {
                if (strlen($namePart) > 2 && strpos($lowerPassword, $namePart) !== false) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Check if password has too many repeated characters
     */
    private function hasTooManyRepeatedChars($password) {
        $length = strlen($password);
        for ($i = 0; $i < $length - $this->maxRepeatedChars; $i++) {
            $char = $password[$i];
            $repeated = 1;
            
            for ($j = $i + 1; $j < $length && $password[$j] === $char; $j++) {
                $repeated++;
                if ($repeated > $this->maxRepeatedChars) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Check if password contains common sequences
     */
    private function containsSequences($password) {
        $lowerPassword = strtolower($password);
        
        foreach ($this->sequences as $sequence) {
            if (strpos($lowerPassword, $sequence) !== false) {
                return true;
            }
            
            // Check reverse sequence
            $reverse = strrev($sequence);
            if (strpos($lowerPassword, $reverse) !== false) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Calculate password strength
     */
    private function calculateStrength($password) {
        $score = 0;
        $length = strlen($password);
        
        // Length contribution
        if ($length >= 8) $score += 1;
        if ($length >= 12) $score += 1;
        if ($length >= 16) $score += 1;
        
        // Character variety contribution
        if (preg_match('/[a-z]/', $password)) $score += 1;
        if (preg_match('/[A-Z]/', $password)) $score += 1;
        if (preg_match('/[0-9]/', $password)) $score += 1;
        if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) $score += 1;
        
        // Complexity contribution
        if (preg_match('/[a-z].*[A-Z]|[A-Z].*[a-z]/', $password)) $score += 1; // Mixed case
        if (preg_match('/[a-zA-Z].*[0-9]|[0-9].*[a-zA-Z]/', $password)) $score += 1; // Letters and numbers
        if (preg_match('/[a-zA-Z0-9].*[!@#$%^&*(),.?":{}|<>]|[!@#$%^&*(),.?":{}|<>].*[a-zA-Z0-9]/', $password)) $score += 1; // Alphanumeric and special
        
        // Determine strength level
        if ($score >= 8) return 'very_strong';
        if ($score >= 6) return 'strong';
        if ($score >= 4) return 'medium';
        if ($score >= 2) return 'weak';
        return 'very_weak';
    }
    
    /**
     * Get numerical strength score (0-100)
     */
    private function getStrengthScore($password) {
        $strength = $this->calculateStrength($password);
        
        $scores = [
            'very_weak' => 10,
            'weak' => 30,
            'medium' => 50,
            'strong' => 75,
            'very_strong' => 95
        ];
        
        return $scores[$strength] ?? 0;
    }
    
    /**
     * Get password requirements for display
     */
    public function getRequirements() {
        return [
            'min_length' => $this->minLength,
            'max_length' => $this->maxLength,
            'require_uppercase' => $this->requireUppercase,
            'require_lowercase' => $this->requireLowercase,
            'require_numbers' => $this->requireNumbers,
            'require_special' => $this->requireSpecialChars,
            'prevent_common' => $this->preventCommonPasswords,
            'prevent_user_info' => $this->preventUserInfo,
            'max_repeated' => $this->maxRepeatedChars,
            'prevent_sequences' => $this->preventSequences
        ];
    }
    
    /**
     * Generate password suggestion based on requirements
     */
    public function generateStrongPassword($length = 16) {
        $length = max($this->minLength, min($length, $this->maxLength));
        
        $chars = '';
        if ($this->requireLowercase) $chars .= 'abcdefghijklmnopqrstuvwxyz';
        if ($this->requireUppercase) $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($this->requireNumbers) $chars .= '0123456789';
        if ($this->requireSpecialChars) $chars .= '!@#$%^&*().?{}|<>';
        
        $password = '';
        $charsLength = strlen($chars);
        
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, $charsLength - 1)];
        }
        
        // Ensure it meets all requirements
        $validation = $this->validate($password);
        if (!$validation['valid']) {
            return $this->generateStrongPassword($length); // Regenerate if invalid
        }
        
        return $password;
    }
}
