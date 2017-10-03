<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Action;

/**
 * Classe de controle de login
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class Login extends Action
{
	/**
	 * Action: login
	 */
	public function login()
	{
		$this->render('login', false);
	}
}
?>