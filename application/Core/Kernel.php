<?php
namespace App\Core;

use Symfony\Component\HttpFoundation\Request;
use App\Core\Router;

class Kernel {

    public function run()
    {   
        session_start();
        
        $request = Request::createFromGlobals();
        
        $router = new Router();

        $router->dispatch($request);
    }
}