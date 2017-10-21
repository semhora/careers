<?php
use Symfony\Component\Routing;
use \App\Controllers;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;

$routes = new Routing\RouteCollection();

$routes->add(
    'home',
    new Routing\Route('/', [
        '_controller' => Controllers\HomeController::class,
        '_action' => 'index'
    ])
);

$routes->add(
    'event_specifc',
    new Routing\Route(
        '/event/{id}',
        [
            '_controller' => Controllers\Event\EventController::class,
            '_action' => 'event',
        ],
        [
            'id' => '[0-9]',
        ]
    )
);

$routes->add(
    'new_event',
    new Routing\Route(
        '/event/new',
        [
            '_controller' => Controllers\Event\EventController::class,
            '_action' => 'newEvent',
        ]
    )
);

/**
 * Login Routes
 */
$routes->add(
    'login',
    new Routing\Route(
        '/login',
        [
            '_controller' => Controllers\Login\LoginController::class,
            '_action' => 'index',
        ]
    )
);
$routes->add(
    'logout',
    new Routing\Route(
        '/logout',
        [
            '_controller' => Controllers\Login\LoginController::class,
            '_action' => 'logout',
        ]
    )
);


/**
 * Admin Routes
 */
$routes->add(
    'admin',
    new Routing\Route(
        '/admin',
        [
            '_controller' => Controllers\Admin\AdminController::class,
            '_action' => 'index',
        ]
    )
);

/**
 * Users
 */
$routes->add(
    'user_new',
    new Routing\Route(
        '/user/new',
        [
            '_controller' => Controllers\Admin\AdminController::class,
            '_action' => 'user',
        ]
    )
);
$routes->add(
    'user_list',
    new Routing\Route(
        '/user/list',
        [
            '_controller' => Controllers\Admin\AdminController::class,
            '_action' => 'list',
        ]
    )
);

return $routes;
