<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/routing.php';
require_once __DIR__ . '/constants.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Session\Session;

/** @var Request $request */
$request = Request::createFromGlobals();

/** @var Response $response */
$response = new Response();

/** @var Session $session */
$session = new Session();

$config = include __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';

try {
    $context = new RequestContext();
    $context->fromRequest($request);
    $matcher = new UrlMatcher($routes, $context);

    $attributes = $matcher->match($request->getPathInfo());
    $routing = (new \System\Router\Routing())->Matcher($attributes);

} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {

    $response = new Response('', 404);
    $response->setContent(sprintf('Not Found...Whooops =/<br><h3>%s</h3>', $e->getMessage()));
} catch (\Exception $e) {

    $response = new Response('', 404);
    $response->setContent('Not Found...Whooops: ' . $e->getMessage());
}
