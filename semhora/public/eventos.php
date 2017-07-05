<?php
/**
 * programa que acessa o controller de events do blog e insere as variavels para o template engine
 * */
require_once __DIR__."/../config/config.php";
$logado = false;
$controller = new controller\EventsController($logado);

$events = $controller->getAll();
$eventsSidebar = $events;

if(isset($_POST['any']) && $_POST['any']){

    $events = $controller->getByFilter($_POST);
    $smarty->assign("key",$_POST['any']);
}

$smarty->assign("eventsSidebar",$eventsSidebar);
$smarty->assign("events",$events);
$smarty->assign("online", isset($_SESSION['user']));
$smarty->display('eventos/home.html');