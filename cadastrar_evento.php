<?php
define( 'WWW_ROOT' , dirname( __FILE__ ) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once( WWW_ROOT . DS . 'autoload.php');

use Model\Evento;

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$local = $_POST["local"];
$horario = $_POST["horario"];
$imagem = armazenarImagem();
$status = $_POST["status"];

$evento = new Evento($nome, $descricao, $local, $horario, $imagem, $status);
$evento->armazenar();
header("Location: /");

function armazenarImagem() {
    $uploaddir = getcwd() . '/imagens/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

    $clean_file = preg_replace("/[^A-Z0-9\.\_-]/i", " ", basename($_FILES['userfile']['name']));
    $fileName = hash_file('sha256', $uploadfile);
    rename($uploadfile, getcwd() . '/imagens/' . $fileName.$extention);

    return $fileName;
}