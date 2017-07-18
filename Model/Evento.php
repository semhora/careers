<?php

class Evento {

    private $id;
    private $nome;
    private $descricao;
    private $local;
    private $hora_inicio;
    private $imagem;
    private $status;

    public function setId($id) {
        $this->id = ($id == '') ? 0 : $id;
    }

    public function getId() {
        return $this->id;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function getLocal() {
        return $this->local;
    }

    public function setHoraInicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    public function getHoraInicio() {
        return $this->hora_inicio;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

}

?>