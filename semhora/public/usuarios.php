<?php
require_once __DIR__."/../config/config.php";

$controller = new controller\UsuariosController();
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : "lista";

if ($method == "edita") {
    if(isset($_POST['email'])){
        $msg = $controller->edit($_POST);

        $smarty->assign("msg", $msg);
    }

    $filter["id"] = $_REQUEST['id'];
    $users = $controller->getByFilter($filter);
    $tpl = 'users/form.html';
    if($users) {
        $smarty->assign("id",$filter['id']);
    } else {
        $msg["color"] = "alert-danger";
        $msg["glyphicon"] = "glyphicon-exclamation-sign";
        $msg["text"] = "Usuário não encontrado.";
        $smarty->assign("msg",$msg);
    }


    $smarty->assign("author", $controller->user->name);

} else if ($method == "remove") { #################### remove o usuario
    if (
        isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&
        isset($_POST['id'])
    ) {
        $controller->removeUser($_POST['id']);
        die;
    }

} else {
    $users = $controller->getAllUsers();
    $tpl = 'users/list.html';
}

if(isset($users) && $users)
    $smarty->assign("users", $users);

$smarty->assign("online", isset($_SESSION['user']));
$smarty->display($tpl);

