<?php
class Router {
    private $routes = [];
    private $currentRoute = '';
    
    public function __construct() {
        $this->currentRoute = $this->getCurrentRoute();
    }
    
    public function get($path, $controller, $method = null) {
        if ($controller instanceof Closure) {
            $this->routes['GET'][$path] = ['closure' => $controller];
        } else {
            $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
        }
    }
    
    public function post($path, $controller, $method = null) {
        if ($controller instanceof Closure) {
            $this->routes['POST'][$path] = ['closure' => $controller];
        } else {
            $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
        }
    }
    
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $this->currentRoute;
        
        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            $this->renderError('404', 'Page not found');
            return;
        }
        
        $route = $this->routes[$method][$path];
        
        // Handle closure routes
        if (isset($route['closure'])) {
            $route['closure']();
            return;
        }
        
        // Handle controller routes
        $controllerClass = $route['controller'];
        $controllerMethod = $route['method'];
        
        if (!file_exists(__DIR__ . "/../controllers/{$controllerClass}.php")) {
            http_response_code(500);
            $this->renderError('500', 'Controller not found');
            return;
        }
        
        require_once __DIR__ . "/../controllers/{$controllerClass}.php";
        $controller = new $controllerClass();
        
        if (!method_exists($controller, $controllerMethod)) {
            http_response_code(500);
            $this->renderError('500', 'Method not found');
            return;
        }
        
        $controller->$controllerMethod();
    }
    
    private function getCurrentRoute() {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $uri = rtrim($uri, '/');
        return $uri ?: '/';
    }
    
    private function renderError($code, $message) {
        require_once __DIR__ . "/../views/errors/{$code}.php";
    }
}
