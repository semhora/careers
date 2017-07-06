<?php namespace App;

class Route extends Bootstrap
{

	protected function initRoutes()
	{
		$routes['home'] = array(
			'route'		=> '/', 
			'controller'=> 'indexController',
			'action' 	=> 'index'
		);

		$routes['admin'] = array(
			'route'		=> '/admin', 
			'controller'=> 'adminController',
			'action' 	=> 'login'
		);

		$routes['login'] = array(
			'route'		=> '/admin/login', 
			'controller'=> 'adminController',
			'action' 	=> 'login'
		);

		$routes['logout'] = array(
			'route'		=> '/admin/logout', 
			'controller'=> 'adminController',
			'action' 	=> 'logout'
		);

		$routes['dashboard'] = array(
			'route'		=> '/admin/dashboard', 
			'controller'=> 'adminController',
			'action' 	=> 'dashboard'
		);

		/**
		  * Events Routes
		  *
		 **/

		$routes['event'] = array(
			'route'		=> '/admin/event', 
			'controller'=> 'adminController',
			'action' 	=> 'singleEvent'
		);

		$routes['events'] = array(
			'route'		=> '/admin/events', 
			'controller'=> 'adminController',
			'action' 	=> 'allEvents'
		);					

		$routes['save_event'] = array(
			'route'		 => '/admin/event/save',
			'controller' => 'adminController',
			'action'     => 'saveEvent'
		);					

		$routes['add_event'] = array(
			'route'		 => '/admin/add-event',
			'controller' => 'adminController',
			'action'	 => 'addEvent'
		);

		$routes['delete_event'] = array(
			'route'		 => '/admin/delete-event',
			'controller' => 'adminController',
			'action' 	 => 'deleteEvent'
		);

		/**
		  * Users Routes
		  *
		 **/

		$routes['users'] = array(
			'route'		=> '/admin/users', 
			'controller'=> 'adminController',
			'action' 	=> 'allUsers'
		);

		$routes['user'] = array(
			'route'		=> '/admin/user', 
			'controller'=> 'adminController',
			'action' 	=> 'singleUser'
		);

		$routes['save_user'] = array(
			'route'		 => '/admin/user/save',
			'controller' => 'adminController',
			'action'     => 'saveUser'
		);					

		$routes['add_user'] = array(
			'route'		 => '/admin/add-user',
			'controller' => 'adminController',
			'action'	 => 'addUser'
		);

		// JSON RETURNS
		$routes['dologin'] = array(
			'route'		=> '/admin/json/login', 
			'controller'=> 'adminController',
			'action' 	=> 'doLogin'
		);	

		$this->setRoutes($routes);
	}

}
