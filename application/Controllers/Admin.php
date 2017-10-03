<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Action;

/**
 * Controller Admin
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class Admin extends Action
{

    /**
     * Action: home
     */
    public function home()
    {
        $this->render('home');
    }
}