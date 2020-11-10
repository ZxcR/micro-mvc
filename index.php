<?php

require_once "vendor/autoload.php";

require_once "application/Config/database.php";

(new App\Core\Kernel)->run();