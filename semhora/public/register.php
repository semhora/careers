<?php
/**
 * programa que acessa o controller de login do sistema e insere as variavels para o template engine
 * */
require_once __DIR__ . "/../config/config.php";

$controller = new \controller\AuthController();

if(isset($_POST['nome'])){
    $falhaCadastro = $controller->registerNewUser($_POST);
    $smarty->assign("falhaCadastro", $falhaCadastro);
}

$smarty->assign("online", isset($_SESSION['user']));
$smarty->display('auth/register.html');