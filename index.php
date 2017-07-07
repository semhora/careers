<?php

session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

require_once 'vendor/autoload.php';
require_once 'Autoloader.php';
require_once './config.php';
require_once './bootstrap.php';

$routeBuilder = new RouteCollector();

Autoloader::register();
Route::build($routeBuilder);

try {
    $dispatcher = new Dispatcher($routeBuilder->getData());

    list($route) = explode('?', $_SERVER['REQUEST_URI']);
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route), "\n";
} catch (HttpRouteNotFoundException $exc) {
    echo "<b>Ops, você tentou buscar uma página que não existe!</b> <br><br> Tente rever sua URL! <br><br><br> <pre> {$exc->getMessage()}";
}


