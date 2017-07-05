<?php
/**
 * programa que acessa o controller principal somente para mostrara tela inicial e inserir as variavels para o template engine
 * */
require_once __DIR__."/../config/config.php";

$controller = new controller\HeaderController;

$smarty->assign("online", isset($_SESSION['user']));
$smarty->display('home.html');