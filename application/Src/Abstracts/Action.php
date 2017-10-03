<?php
namespace Application\Src\Abstracts;

/**
 * Classe Action
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package Application/Src
 *
 */
abstract class Action
{
	protected  $view;
	protected  $action;
	
	/**
	 * Método construtor
	 */
	public function __construct()
	{
		$this->view = new \stdClass();
	}
	
	/**
	 * Método de renderização
	 * @param string $action
	 * @param string $layout
	 */
	protected function render($action, $layout=true)
	{
		$this->action = $action;
		if ($layout == true && file_exists("../application/Views/layout/masterPage.phtml")) {
			include_once '../application/Views/layout/masterPage.phtml';
		}else {
			$this->content();
		}
	}
	
	/**
	 * Método de recuperação do conteúdo
	 */
	protected function content() 
	{
		$atualClass = get_class($this);
		$singleClassName = strtolower(str_replace("Application\\Controllers\\", "", $atualClass));
		include_once 'application/Views/' . $singleClassName . DIRECTORY_SEPARATOR . $this->action . '.phtml';
	}
}
?>