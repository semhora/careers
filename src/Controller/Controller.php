<?php
namespace App\Controller;

class Controller
{
    public $templateEngine = null;

    public function __construct()
    {
        $this->templateEngine = \Foil\engine([
            'folders' => [__DIR__ . '/../View']
        ]);
    }
}
