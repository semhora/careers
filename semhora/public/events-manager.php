<?php
require_once __DIR__."/../config/config.php";
$controller = new controller\EventsController();
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : "lista";

if ($method == "edita") { #################### edita os eventos
    if (isset($_POST['nome'])) {
        $msg = $controller->edit($_POST, $_FILES);
        $smarty->assign("msg", $msg);
    }

    $filter["id"] = $_REQUEST['id'];
    $events = $controller->getByFilter($filter);
    $tpl = 'eventsManager/form.html';

    $smarty->assign("id",$filter['id']);
    $smarty->assign("author", $controller->user->name);

}else if ($method == "cadastra") { #################### cadastra os eventos
    $tpl = 'eventsManager/form.html';
    if(isset($_POST['nome'])) {
        $msg = $controller->save($_POST, $_FILES);

        $smarty->assign("msg", $msg);

    }
    $smarty->assign("author", $controller->user->name);

} else if ($method == "remove") { #################### remove os eventos
    if (
        isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&
        isset($_POST['id'])
    ) {
        $controller->removeEvento($_POST['id']);
        die;
    }

} else { ################ lista os eventos
    $events = $controller->getAll();
    $tpl = 'eventsManager/list.html';
}
if(isset($events))
    $smarty->assign("events", $events);

$smarty->assign("online", isset($_SESSION['user']));
$smarty->display($tpl);