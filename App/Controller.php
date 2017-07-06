<?php namespace App;

abstract class Controller
{
	protected $view;
	private $action;

	public function __construct()
	{
		$this->view = new \stdClass;
	}

	protected function render($action, $layout = true)
	{
		$this->action = $action;	

		// Loads custom header or normal header
		$custom_header = '../App/Views/header-'.$this->action.'.php';
		$header = (!file_exists( $custom_header ))? 'header.php' : $custom_header;

		// Loads custom footer or normal footer
		$custom_footer = '../App/Views/footer-'.$this->action.'.php';
		$footer = (!file_exists( $custom_footer ))? 'footer.php' : $custom_footer;

		if( $layout && file_exists("../App/Views/layout.php") ){
			include_once "../App/Views/layout.php";
		}else{
			$this->content();
		}
	}

	protected function content()
	{
		$current = get_class($this);
		$singleClassName = strtolower((str_replace("Controller","",str_replace("App\\Controllers\\","",$current))));

		include_once "../App/Views/".$singleClassName."/".$this->action.".php";		
	}
}

?>