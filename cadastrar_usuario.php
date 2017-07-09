<?php
define( 'WWW_ROOT' , dirname( __FILE__ ) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once( WWW_ROOT . DS . 'autoload.php');

use Model\Usuario;

$login = $_POST["login"];
$senha = $_POST["senha"];

$usuario = new Usuario($login, $senha);
$usuario->armazenar();
header("Location: /");