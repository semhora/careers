<?php

namespace Controller;

use Exception;
use Service\EventService;

abstract class AbstractController
{

    protected function render($path, $vars = null)
    {
        $prefix = 'public/views/';

        if (!is_file($prefix . $path)) {
            throw new Exception("View {$path} not found");
        }

        if (is_array($vars) && !empty($vars)) {
            extract($vars, EXTR_SKIP);
        }

        ob_start();
        include $prefix . $path;
        return ob_get_clean();
    }

    protected function getRequest()
    {
        return $_REQUEST;
    }

    protected function getFiles()
    {
        return $_FILES;
    }

    /**
     * 
     * @return EventService
     */
    protected function getEventService()
    {
        return new EventService();
    }

}
