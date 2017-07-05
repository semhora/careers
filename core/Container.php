<?php

namespace Core;


class Container
{
    public static function newController($controller)
    {
        $path = "App\\Controllers\\" . $controller;
        return new $path;
    }

    public static function newHelper($helper)
    {
        $path = "App\\Helpers\\" . $helper;
        return new $path;
    }

}