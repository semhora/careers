<?php
namespace Model;

class Evento
{
    public $nome;
    public $descricao;
    public $local;
    public $horario;
    public $imagem;
    public $status;

    function __construct($nome, $descricao, $local, $horario, $imagem, $status) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->local = $local;
        $this->horario = $horario;
        $this->imagem = $imagem;
        $this->status = $status;
    }
    
    public function armazenar() {
        $s = file_get_contents('eventos.txt');
        $eventos = unserialize($s);
        if ($eventos == false) {
            print "vazio<br>";
            $eventos = array();
        }
        $tamanho = count($eventos);
        print ("tamanho: " . $tamanho);
        $eventos[$tamanho] = $this;
        $s = serialize($eventos);
        file_put_contents('eventos.txt', $s);
    }

    public function buscar() {

    }

    public static function buscarTodos() {
        $s = file_get_contents('eventos.txt');
        $eventos = unserialize($s);
        if ($eventos == false) {
            $eventos = array();
        }
        return $eventos;
    }
}