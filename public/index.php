<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/utils.php';

spl_autoload_register(function ($class) {
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path($result . '.php');
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
require base_path('Core/routes.php');

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
