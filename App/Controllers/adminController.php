<?php namespace App\Controllers;

use \App\Controller;
use \App\Container;

class AdminController extends Controller
{

	public function login(){

		// Page Title
		$this->view->page_title = 'EventSys - Login';

		$this->render('login');
	} // public function login(){ ... }

	public function dashboard()
	{
		// Test if user is logged in
		$this->checkIfIsLogged();

		// Page Title
		$this->view->page_title = 'EventSys - Dashboard';
		
		$this->render("dashboard");
	} // public function dashboard() { ... }

	public function singleEvent()
	{
		$this->checkIfIsLogged();

		$events = Container::getModel('events');

		$this->view->event = $events->getEvent($_GET['id']); 

		$this->render("single-event");
	} // public function singleEvent() { ... }	

	public function allEvents()
	{
		$this->checkIfIsLogged();

		$this->view->page_title = 'EventSys - Todos os Eventos';

		// Get all events
		$events = Container::getModel('events');
		$this->view->allEvents = $events->allEvents();

		$this->render("all-events");
	} // public function allEvents() { ... }

	public function addEvent(){
		$this->render("add-event");
	} // public function addEvent(){ ... }

	public function doLogin()
	{
		if( $_POST ){
			
			$response = array();

			$response['status'] = 'false';
			$response['message'] = 'Login / Senha incorreto(s)';

			$login = Container::getModel('users');
			$loginResponse = $login->checkUser($_POST['login'], $_POST['password']);

			if( $loginResponse ) {
				$response['userid'] = $loginResponse->id;
				$response['status'] = 'true';
			} // if( $loginReponse ) { ... } 

			echo json_encode($response);

		} // if( $_POST ) { ... }
	}

	public function saveEvent()
	{
		$this->checkIfIsLogged();

		if( $_POST ){

			$eventObj = Container::getModel('events');

			$action = $_POST['action'];

			switch( $action ){
				case 'update':
					$return = $eventObj->$action($_POST);
					$message = "Evento alterado com sucesso";
				break;

				default:
					$return = $eventObj->$action($_POST);
					$message = "Evento criado com sucesso";
				break;
			} // switch( $action ) { ... }

			if($return){

				$_SESSION['message']  = '<div class="alert alert-success active" role="alert">';
				$_SESSION['message'] .= $message;
				$_SESSION['message'] .= '</div>';

			}else{

				$_SESSION['message']  = '<div class="alert alert-danger active" role="alert">';
				$_SESSION['message'] .= 'Ocorreu um erro';
				$_SESSION['message'] .= '</div>';

			} // if($return){ ... }
			
			header('Location: /admin/events');
		
		} // if( $_POST ){ ... }
	
	} // public function saveEvent()
	
	public function deleteEvent()
	{	
		$this->checkIfIsLogged();

		$eventObj = Container::getModel('events');
		$return = $eventObj->delete($_GET['id']);

		$message = "Evento apagado com sucesso";

		if($return){

			$_SESSION['message']  = '<div class="alert alert-success active" role="alert">';
			$_SESSION['message'] .= $message;
			$_SESSION['message'] .= '</div>';

		}else{

			$_SESSION['message']  = '<div class="alert alert-danger active" role="alert">';
			$_SESSION['message'] .= 'Ocorreu um erro';
			$_SESSION['message'] .= '</div>';

		} // if($return){ ... }		

		header('Location: /admin/events');
	} // public function deleteEvent() { ... }


	/**
	 * USERS METHODS
	 **/

	public function allUsers()
	{
		$this->checkIfIsLogged();

		$this->view->page_title = 'EventSys - Todos os Usuários';

		// Get all users
		$usersObj = Container::getModel('users');
		$this->view->allUsers = $usersObj->allUsers();

		$this->render("all-users");
	}

	public function singleUser()
	{
		$this->checkIfIsLogged();

		$userObj = Container::getModel('users');

		$this->view->user = $userObj->getUser($_GET['id']); 

		$this->render("single-user");
	} // public function singleUser() { ... }	

	public function saveUser()
	{
		$this->checkIfIsLogged();

		if( $_POST ){

			$userObj = Container::getModel('users');

			$action = $_POST['action'];

			switch( $action ){
				case 'update':
					$return = $userObj->$action($_POST);
					$message = "Usuário alterado com sucesso";
				break;

				default:
					$return = $userObj->$action($_POST);
					$message = "Usuário criado com sucesso";
				break;
			} // switch( $action ) { ... }

			if($return){

				$_SESSION['message']  = '<div class="alert alert-success active" role="alert">';
				$_SESSION['message'] .= $message;
				$_SESSION['message'] .= '</div>';

			}else{

				$_SESSION['message']  = '<div class="alert alert-danger active" role="alert">';
				$_SESSION['message'] .= 'Ocorreu um erro';
				$_SESSION['message'] .= '</div>';

			} // if($return){ ... }
			
			header('Location: /admin/users');
		
		} // if( $_POST ){ ... }
	
	} // public function saveUser()

	public function addUser(){
		$this->render("add-user");
	} // public function addEvent(){ ... }

	public function logout(){
		setcookie('userid', null, -1, '/');
		header('Location: /admin/login');
	}

	private function checkIfIsLogged()
	{
		if( !$_COOKIE['userid'] ){

			header('Location: /admin/login');

		} // if( $_SESSION['admin'] ) { ... }
	} // private function checkIfIsLogged() { ... }
}

?>