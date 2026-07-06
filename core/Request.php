<?php
/**
 * HTTP Request Handler
 * Detects request type and provides helper methods
 */
class Request {
    private $data;
    private $headers;
    
    public function __construct() {
        $this->data = $this->parseInput();
        $this->headers = $this->getHeaders();
    }
    
    /**
     * Check if request is AJAX
     */
    public function isAjax() {
        return (
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
        ) || (
            isset($_SERVER['HTTP_ACCEPT']) && 
            strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/json') !== false
        );
    }
    
    /**
     * Check if client wants JSON response
     */
    public function wantsJson() {
        return $this->isAjax() || 
               (isset($_GET['format']) && $_GET['format'] === 'json') ||
               (isset($_SERVER['HTTP_ACCEPT']) && 
                strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/json') !== false);
    }
    
    /**
     * Get request method
     */
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
    
    /**
     * Get request URI
     */
    public function getUri() {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }
    
    /**
     * Get all input data
     */
    public function all() {
        return $this->data;
    }
    
    /**
     * Get specific input value
     */
    public function get($key, $default = null) {
        return $this->data[$key] ?? $default;
    }
    
    /**
     * Get specific header
     */
    public function header($key, $default = null) {
        $key = 'HTTP_' . strtoupper(str_replace('-', '_', $key));
        return $this->headers[$key] ?? $default;
    }
    
    /**
     * Parse input data from POST/PUT/PATCH
     */
    private function parseInput() {
        $data = [];
        
        // Parse form data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
        }
        
        // Parse JSON input
        $input = file_get_contents('php://input');
        if ($input && !empty($input)) {
            $json = json_decode($input, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data = array_merge($data, $json);
            }
        }
        
        // Include GET parameters for all methods
        $data = array_merge($data, $_GET);
        
        return $data;
    }
    
    /**
     * Get all headers
     */
    private function getHeaders() {
        $headers = [];
        
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $headers[$key] = $value;
            }
        }
        
        return $headers;
    }
    
    /**
     * Check if request is API request
     */
    public function isApi() {
        $uri = $this->getUri();
        return strpos($uri, '/api/') === 0;
    }
    
    /**
     * Check if request is web request
     */
    public function isWeb() {
        return !$this->isApi();
    }
}
?>
