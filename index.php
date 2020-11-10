<?php

require_once "vendor/autoload.php";

require_once "application/config/database.php";

(new App\Core\Kernel)->run();