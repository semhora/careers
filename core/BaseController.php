<?php

namespace Core;


abstract class BaseController
{
    // atributo que armazena os dados da view
    protected $view;

    // caminho da view
    private $viewpath;

    // caminho template
    private $layoutpath;

    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function render($path, $layout_path = null)
    {
        $this->viewpath = $path;

        $this->layout_path = $layout_path;

        if(is_null($layout_path))
        {
            $this->content();
        }else{
            $this->layout();
        }

    }

    private function content()
    {
        if(file_exists(__DIR__ . "/../app/Views/{$this->viewpath}.phtml")){
            require_once(__DIR__ . "/../app/Views/{$this->viewpath}.phtml");
        }else{
            echo "View não existe";
        }
    }

    private function layout()
    {
        if(file_exists(__DIR__ . "/../app/Views/{$this->layout_path}.phtml")){
            require_once(__DIR__ . "/../app/Views/{$this->layout_path}.phtml");
        }else{
            echo "Layout não existe";
        }
    }

}