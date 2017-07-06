<?php namespace App;

abstract class Bootstrap
{
	private $routes;

	public function __construct()
	{
		$this->initRoutes();
		$this->run($this->getUrl());
	}	

	abstract protected function initRoutes();

	protected function run($url)
	{
		array_walk($this->routes, function($route) use ($url){
			if($url == $route['route']){

				$class = "App\\Controllers\\".ucfirst($route['controller']);
				$controller = new $class;
				$action = $route['action'];
				$controller->$action();
			}
		});
	}

	protected function setRoutes(array $routes)
	{
		$this->routes = $routes;
	}

	protected function getUrl()
	{

		// REMOVES THE BAR FROM THE END OF THE URL
		$url = trim($_SERVER['REQUEST_URI']);

		return parse_url( $url, PHP_URL_PATH );
	}
}


?>