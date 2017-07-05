<?php
/**
 * programa que desloga o usuário
 * */
require_once __DIR__."/../config/config.php";

$controller = new \controller\HeaderController();
$controller->logout();