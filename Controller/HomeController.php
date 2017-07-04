<?php

include_once('Model/DB.php');
include_once('Model/Usuario.php');
include_once('Model/UsuarioDAO.php');

class HomeController {

    public function index() {
        include_once('View/home/index.php');
    }

    public function login() {

        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN VAI PRA HOME LOGADO
            header('location:index.php?controller=home&action=index');
        } else {
            if ($_POST) {

                $_POST['email'] = addslashes($_POST['email']);
                $_POST['senha'] = addslashes($_POST['senha']);

                $usuario = new Usuario();
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);

                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->getUser($usuario);

                if ($usuario->getId() > 0) { //EXISTE USUÁRIO
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);

                    $_SESSION['user']['id'] = $usuario->getId();
                    $_SESSION['user']['nome'] = $usuario->getNome();
                    $_SESSION['user']['email'] = $usuario->getEmail();
                    $_SESSION['user']['senha'] = $usuario->getSenha();
                    $_SESSION['user']['status'] = $usuario->getStatus();

                    header('location:index.php?controller=home&action=index');
                } else {
                    $_SESSION['success'] = false;
                    $_SESSION['msg'] = 'Usuário e/ou Senha Incorreto(s)';

                    $_SESSION['email'] = $usuario->getEmail();
                    $_SESSION['senha'] = $usuario->getSenha();

                    include_once('View/home/login.php');
                }
            } else {
                include_once('View/home/login.php');
            }
        }
    }

    public function logout() {
        session_destroy();

        header('location:index.php?controller=home&action=index');
    }

}
