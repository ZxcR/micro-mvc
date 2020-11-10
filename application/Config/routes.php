<?php
return [
    '/login' => ['LoginController', 'index', App\Helpers\Guard::notAuthorized()],   
    '/logout' => ['LoginController', 'logout', App\Helpers\Guard::isAuth()],   
    '/auth' => ['LoginController', 'auth', App\Helpers\Guard::notAuthorized()],   
    '/' => ['TaskController', 'index'],
    '/index' => ['TaskController', 'index'],
    '/task/create' => ['TaskController', 'create'],
    '/task/store' => ['TaskController', 'store'],
    '/task/edit' => ['TaskController', 'edit', App\Helpers\Guard::isAuth()],
    '/task/update' => ['TaskController', 'update', App\Helpers\Guard::isAuth()],
    '/task/change-status' => ['TaskController', 'changeStatus', App\Helpers\Guard::isAuth()]
];