<?php namespace App\Controllers;

use \App\Controller;
use \App\Container;

class IndexController extends Controller
{
	public function index()
	{

		$this->view->page_title = 'EventSys - Eventos';

		// Get all events
		$events = Container::getModel('events');
		$this->view->events = $events->allEvents();

		$this->render("index");
	}

}

?>