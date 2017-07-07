<?php
define( 'WWW_ROOT' , dirname( __FILE__ ) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once( WWW_ROOT . DS . 'autoload.php');

use Model\Evento;

    //Testando serialização
function armazenarEvento() {
    $evento = new Evento("Balada Top", "É uma balada muito top", "Lugar top", "22:00", "imagem.jpg", "ativo");
    $evento->armazenar();
}

function buscarTodosEventos() {
    $eventos = Evento::buscarTodos();
    foreach ($eventos as $evento) {
        print $evento->nome;
        print ("<br>");
    }
}

buscarTodosEventos();

?>