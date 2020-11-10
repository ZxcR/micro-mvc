<?php
namespace App\Core;
use App\Helpers\Guard;

class Router {
    public $routes = [];

    public $controller;
    public $method;
    public $actionAccess = true;

    public function __construct()
    {
        $this->routes = require(__DIR__ . '/../Config/routes.php');
    }
    
    public function dispatch($request)
    {   
        $pathInfo = $request->getPathInfo();
        
        if(isset($this->routes[$pathInfo])) {
            
            $this->controller = "App\Controllers\\{$this->routes[$pathInfo][0]}";
            $this->method = $this->routes[$pathInfo][1];
            if(isset($this->routes[$pathInfo][2])) {
                $this->actionAccess = $this->routes[$pathInfo][2];
            }

            if(class_exists($this->controller)) {
                $controller_obj = new $this->controller;
                if(method_exists($this->controller, $this->method)) {
                    if($this->actionAccess) {
                        $controller_obj->{$this->method}($request);
                    } else {
                        http_response_code(403);
                    }
                } else {
                    throw new \Exception("method {$this->method} of {$this->controller} not found", 1);
                }
                
            } else {
                throw new \Exception("Controller {$this->controller} not found", 1);
            }
        } else {
            http_response_code(404);
        }
    }
}