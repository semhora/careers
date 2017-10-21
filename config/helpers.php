<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use \System\Config;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;

if (! function_exists('view')) {
    function view($viewName, $data = []) {
        \System\View\ViewRender::render($viewName, $data);
    }
}

if (! function_exists('includeView')) {
    function includeView($viewName) {
        \System\View\ViewRender::render($viewName);
    }
}

if (! function_exists('request')) {
    function request() {
        global $request;
        return $request;
    }
}

if (! function_exists('response')) {
    function response() {
        global $response;
        return $response;
    }
}

if (! function_exists('session')) {
    function session() {
        global $session;
        return $session;
    }
}

if (! function_exists('initializeDoctrine')) {
    function initializeDoctrine() {
        // configuring doctrine
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../app/Entities'],
            $isDevMode,
            null,
            null,
            false
        );

        $conn = Config\Config::getConfig('db');

        return EntityManager::create($conn, $config);
    }
}

if (! function_exists('getUrl')) {
    function getUrl($name, $data = []) {
        global $routes;
        $context = new RequestContext();
        $context->fromRequest(request());

        $generator = new Routing\Generator\UrlGenerator($routes, $context);
        return $generator->generate($name, $data);
    }
}

if (! function_exists('image')) {
    function image($image) {
        if (substr($image, 0, 5) != 'data:') {
            return '/uploads/' . $image;
        }

        return $image;
    }
}

if (! function_exists('redirectIfNotLogged')) {
    function redirectIfNotLogged() {
        if (! session()->get('logged')) {
            session()->getFlashBag()->set('error', 'Por favor, efetue o login.');
            header('Location: /');
        }
    }
}
