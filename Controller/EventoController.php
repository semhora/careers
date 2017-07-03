<?php

include_once('Model/DB.php');
include_once('Model/Evento.php');
include_once('Model/EventoDAO.php');

class EventoController {

    public function listar() {
        $eventoDAO = new EventoDAO();
        $query = $eventoDAO->getAll($_GET['status']);

        include_once('View/evento/list.php');
    }

    //INSERT E EDIT NA EMSMA ACTION
    public function salvar() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            $evento = new Evento();

            $_POST['id'] = addslashes($_POST['id']);
            $_POST['nome'] = utf8_decode(addslashes($_POST['nome']));
            $_POST['descricao'] = utf8_decode(addslashes($_POST['descricao']));
            $_POST['local'] = utf8_decode(addslashes($_POST['local']));
            $_POST['hora_inicio'] = addslashes($_POST['hora_inicio']);
            $_POST['status'] = addslashes($_POST['status']);

            $evento->setId($_POST['id']);
            $evento->setNome($_POST['nome']);
            $evento->setDescricao($_POST['descricao']);
            $evento->setLocal($_POST['local']);
            $evento->setHoraInicio($_POST['hora_inicio']);
            $evento->setStatus($_POST['status']);

            //UPLOAD
            if ($_FILES['imagem']['tmp_name'] != '') {
                $target = 'Files/' . $_FILES['imagem']['name'];
                move_uploaded_file($_FILES['imagem']['tmp_name'], $target);

                $evento->setImagem($_FILES['imagem']['name']);
            }

            $eventoDAO = new EventoDAO();

            if ($evento->getId() > 0) {
                if ($eventoDAO->update($evento)) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = 'Evento Alterado com Sucesso';
                } else {
                    $_SESSION['success'] = false;
                    $_SESSION['msg'] = 'Erro ao Alterar';
                }
            } else {
                if ($eventoDAO->insert($evento)) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = 'Evento Cadastrado com Sucesso';
                } else {
                    $_SESSION['success'] = false;
                    $_SESSION['msg'] = 'Erro ao Alterar';
                }
            }

            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['descricao']);
            unset($_SESSION['local']);
            unset($_SESSION['hora_inicio']);
            unset($_SESSION['imagem']);
            unset($_SESSION['status']);

            header('location:?controller=evento&action=listar&status=1');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function novo() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            include_once('View/evento/form.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function editar() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            $eventoDAO = new EventoDAO();
            $evento = $eventoDAO->getById($_GET['id']);

            $_SESSION['id'] = $evento->getId();
            $_SESSION['nome'] = $evento->getNome();
            $_SESSION['descricao'] = $evento->getDescricao();
            $_SESSION['local'] = $evento->getLocal();
            $_SESSION['hora_inicio'] = $evento->getHoraInicio();
            $_SESSION['imagem'] = $evento->getImagem();
            $_SESSION['status'] = $evento->getStatus();

            include_once('View/evento/form.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function visualizar() {

        $eventoDAO = new EventoDAO();
        $evento = $eventoDAO->getById($_GET['id']);

        include_once('View/evento/detalhes.php');
    }

}
