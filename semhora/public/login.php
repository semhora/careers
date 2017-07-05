<?php
/**
 * programa que acessa o controller de login do sistema e insere as variavels para o template engine
 * */
require_once __DIR__."/../config/config.php";

$controller = new controller\AuthController();
if(isset($_POST['login'])){
    $ret = $controller->login($_POST);

    if($ret)
        header("Location: /semhora/");
    else{
        $falhaLogin = "Login não encontrado";
        $smarty->assign("falhaLogin", $falhaLogin);
    }
}
$smarty->assign("online", isset($_SESSION['user']));
$smarty->display('auth/login.html');