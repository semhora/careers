<?php
namespace Model;

class Usuario
{
    public $login;
    public $senha;

    function __construct($login, $senha) {
        $this->login = $login;
        $this->senha = $senha;
    }
    
    public function armazenar() {
        $s = file_get_contents('usuarios.txt');
        $usuarios = unserialize($s);
        if ($usuarios == false) {
            $usuarios = array();
        }
        $tamanho = count($usuarios);
        $usuarios[$tamanho] = $this;
        $s = serialize($usuarios);
        file_put_contents('usuarios.txt', $s);
    }

    public function buscar() {

    }

}