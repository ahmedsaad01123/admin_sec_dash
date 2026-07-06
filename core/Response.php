<?php
/**
 * HTTP Response Handler
 * Provides methods for different response types
 */
class Response {
    /**
     * Return JSON response
     */
    public static function json($data, $status = 200) {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        http_response_code($status);
        
        $response = [
            'success' => $status >= 200 && $status < 300,
            'data' => $data,
            'message' => self::getDefaultMessage($status),
            'timestamp' => date('c')
        ];
        
        echo json_encode($response, JSON_PRETTY_PRINT);
        exit;
    }
    
    /**
     * Return error response
     */
    public static function error($message, $status = 400, $errorCode = null) {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        http_response_code($status);
        
        $response = [
            'success' => false,
            'error' => [
                'message' => $message,
                'code' => $errorCode ?: self::getErrorCode($status),
                'status' => $status
            ],
            'timestamp' => date('c')
        ];
        
        echo json_encode($response, JSON_PRETTY_PRINT);
        exit;
    }
    
    /**
     * Return HTML view
     */
    public static function view($template, $data = []) {
        extract($data);
        
        $templatePath = __DIR__ . '/../views/' . $template . '.php';
        
        if (!file_exists($templatePath)) {
            throw new Exception("View not found: {$template}");
        }
        
        require_once $templatePath;
    }
    
    /**
     * Redirect to URL
     */
    public static function redirect($url, $status = 302) {
        http_response_code($status);
        header("Location: {$url}");
        exit;
    }
    
    /**
     * Get default message for status code
     */
    private static function getDefaultMessage($status) {
        $messages = [
            200 => 'Success',
            201 => 'Created',
            204 => 'No Content',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            422 => 'Validation Error',
            500 => 'Internal Server Error'
        ];
        
        return $messages[$status] ?? 'Unknown Status';
    }
    
    /**
     * Get error code for status
     */
    private static function getErrorCode($status) {
        $codes = [
            400 => 'BAD_REQUEST',
            401 => 'UNAUTHORIZED',
            403 => 'FORBIDDEN',
            404 => 'NOT_FOUND',
            422 => 'VALIDATION_ERROR',
            500 => 'INTERNAL_ERROR'
        ];
        
        return $codes[$status] ?? 'UNKNOWN_ERROR';
    }
    
    /**
     * Set CORS headers for API
     */
    public static function cors() {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
            header('Access-Control-Max-Age: 86400');
            http_response_code(200);
            exit;
        }
    }
}
?>
