<?php

include_once('Model/DB.php');
include_once('Model/Usuario.php');
include_once('Model/UsuarioDAO.php');

class UsuarioController {

    public function listar() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            $usuarioDAO = new UsuarioDAO();
            $query = $usuarioDAO->getAll($_GET['status']);

            include_once('View/usuario/list.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    //INSERT E EDIT NA EMSMA ACTION
    public function salvar() {

        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            $usuario = new Usuario();

            $_POST['id'] = addslashes($_POST['id']);
            $_POST['nome'] = utf8_decode(addslashes($_POST['nome']));
            $_POST['email'] = addslashes($_POST['email']);
            $_POST['senha'] = utf8_decode(addslashes($_POST['senha']));
            $_POST['status'] = addslashes($_POST['status']);

            $usuario->setId($_POST['id']);
            $usuario->setNome($_POST['nome']);
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);
            $usuario->setStatus($_POST['status']);

            $usuarioDAO = new UsuarioDAO();

            if ($usuario->getId() > 0) {
                if ($usuarioDAO->update($usuario)) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = 'Evento Alterado com Sucesso';
                } else {
                    $_SESSION['success'] = false;
                    $_SESSION['msg'] = 'Erro ao Alterar';
                }
            } else {
                if ($usuarioDAO->insert($usuario)) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = 'Evento Cadastrado com Sucesso';
                } else {
                    $_SESSION['success'] = false;
                    $_SESSION['msg'] = 'Erro ao Alterar';
                }
            }

            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['status']);

            header('location:?controller=usuario&action=listar&status=1');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function novo() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            include_once('View/usuario/form.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function editar() {
        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->getById($_GET['id']);

            $_SESSION['id'] = $usuario->getId();
            $_SESSION['nome'] = $usuario->getNome();
            $_SESSION['email'] = $usuario->getEmail();
            $_SESSION['senha'] = $usuario->getSenha();
            $_SESSION['status'] = $usuario->getStatus();


            include_once('View/usuario/form.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

}
