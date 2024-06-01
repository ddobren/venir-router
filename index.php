<?php

// Load the composer autoloader

use Src\Routing\Route;
use Src\Routing\Router;

require_once __DIR__ . '/vendor/autoload.php';

// --------------------------------------------
// |
// | Load the routes files
// |
require_once __DIR__ . '/Routes/web.php';
require_once __DIR__ . '/Routes/api.php';
// --------------------------------------------

$router = new Router();
$router->start();
