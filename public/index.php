<?php

use Core\App;
use Core\Container;
use Core\Session;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Yangon");
session_start();

const BASE_PATH = __DIR__.'/../';

require BASE_PATH . '/vendor/autoload.php';
require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'bootstrap.php';
require BASE_PATH . 'Core/location.php';

$router = new Core\Router();
$routes = require base_path("routes.php");

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($url, $method);

Session::unflash();
