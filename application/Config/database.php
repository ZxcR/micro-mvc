<?php

use Illuminate\Database\Capsule\Manager;

$manager = new Manager();

$manager->addConnection([
    'driver' => 'mysql',
    'host'   => '127.0.0.1',
    'username' => 'mysql',
    'password' => 'mysql',
    'database' => 'bejee',
    'charset'  => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$manager->bootEloquent();