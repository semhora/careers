<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Controller\EventsController;

$container = new League\Container\Container;
$container->share('response', Zend\Diactoros\Response::class);
$container->share(
    'request',
    function () {
        return Zend\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
    }
);

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);
$route = new League\Route\RouteCollection($container);
$route->map('GET', '/', [new EventsController, 'index']);
$route->map('GET', '/details/{id}', [new EventsController, 'details']);
$route->map('GET', '/add', [new EventsController, 'add']);
$route->map('POST', '/save', [new EventsController, 'save']);

$response = $route->dispatch($container->get('request'), $container->get('response'));
$container->get('emitter')->emit($response);
