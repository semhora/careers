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
            $_SESSION['id'] = addslashes($_POST['id']);
            $_SESSION['nome'] = utf8_decode(addslashes($_POST['nome']));
            $_SESSION['email'] = addslashes($_POST['email']);
            $_SESSION['senha'] = utf8_decode(addslashes($_POST['senha']));
            $_SESSION['status'] = addslashes($_POST['status']);

            $msg = '';
            $msg .= ($_SESSION['nome'] == '') ? '<br> - Campo <b>nome</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['email'] == '') ? '<br> - Campo <b>email</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['senha'] == '') ? '<br> - Campo <b>senha</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['status'] == '') ? '<br> - Campo <b>status</b> não pode ser vazio.' : '';

            if ($msg == '') { //SEM CAMPOS VAZIOS
                $usuario = new Usuario();

                $usuario->setId($_SESSION['id']);
                $usuario->setNome($_SESSION['nome']);
                $usuario->setEmail($_SESSION['email']);
                $usuario->setSenha($_SESSION['senha']);
                $usuario->setStatus($_SESSION['status']);

                $usuarioDAO = new UsuarioDAO();

                if ($usuario->getId() > 0) { //JÁ EXISTE
                    if ($usuarioDAO->update($usuario)) { //SUCESSO                        
                        $msg = 'Usuário Alterado com Sucesso';
                        
                        header('location:?controller=usuario&action=listar&status=1&msg='.$msg);
                    } else { //ERRO                   
                        
                        $_SESSION['msg'] = 'Erro ao Alterar';
                    }
                } else { //NOVO
                    if ($usuarioDAO->insert($usuario)) { //SUCESSO
                        
                        $msg = 'Usuário Cadastrado com Sucesso';

                        header('location:?controller=usuario&action=listar&status=1&msg='.$msg);
                    } else { //ERRO                        
                        $_SESSION['msg'] = 'Erro ao Inserir';
                    }
                }
            } else {                
                $_SESSION['msg'] = 'Alguns erros foram encontrados:<br>' . $msg;
            }

            include_once('View/usuario/form.php');
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function novo() {

        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            
            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['status']);
            
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
