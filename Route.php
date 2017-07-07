<?php

use Phroute\Phroute\RouteCollector;

class Route
{

    public static function build(RouteCollector $routeBuilder)
    {
        $routeBuilder->filter('auth', function() use(&$USER_SESSION) {
            if (!isset($_SESSION['auth'])) {
                header("Location: /auth/login");
            }
        });

        $routeBuilder->controller('/admin/user', 'Controller\\UserController', ['before' => 'auth']);
        $routeBuilder->controller('/admin/event', 'Controller\\EventController', ['before' => 'auth']);
        $routeBuilder->controller('/event', 'Controller\\EventController', []);
        $routeBuilder->controller('/auth', 'Controller\\AuthController', []);
    }

}
