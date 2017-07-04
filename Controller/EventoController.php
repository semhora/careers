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
            
            //TRATANDO POST
            $_SESSION['id'] = addslashes($_POST['id']);
            $_SESSION['nome'] = utf8_decode(addslashes($_POST['nome']));
            $_SESSION['descricao'] = utf8_decode(addslashes($_POST['descricao']));
            $_SESSION['local'] = utf8_decode(addslashes($_POST['local']));
            $_SESSION['hora_inicio'] = addslashes($_POST['hora_inicio']);
            $_SESSION['status'] = addslashes($_POST['status']);
           
            $msg = '';
            $msg .= ($_SESSION['nome'] == '') ? '<br> - Campo <b>nome</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['descricao'] == '') ? '<br> - Campo <b>descricao</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['local'] == '') ? '<br> - Campo <b>local</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['hora_inicio'] == '') ? '<br> - Campo <b>hora início</b> não pode ser vazio.' : '';
            $msg .= ($_SESSION['status'] == '') ? '<br> - Campo <b>status</b> não pode ser vazio.' : '';
            $msg .= ($_FILES['imagem']['tmp_name'] == '' && $_SESSION['id'] == '') ? '<br> - Campo <b>imagem</b> não pode ser vazio.' : '';
            
            if ($msg == '') { //SEM CAMPOS VAZIOS
                $evento = new Evento();

                $evento->setId($_SESSION['id']);
                $evento->setNome($_SESSION['nome']);
                $evento->setDescricao($_SESSION['descricao']);
                $evento->setLocal($_SESSION['local']);
                $evento->setHoraInicio($_SESSION['hora_inicio']);
                $evento->setStatus($_SESSION['status']);

                $eventoDAO = new EventoDAO();

                //UPLOAD            
                if ($_FILES['imagem']['tmp_name'] != '') {

                    //VERIFICA SE JÁ EXISTE IMAGEM DO REGISTRO
                    if ($evento->getId() > 0) {
                        $eventoAux = $eventoDAO->getById($evento->getId());

                        $imagem = 'Files/' . $eventoAux->getImagem();
                        if (file_exists($imagem)) {
                            unlink($imagem);
                        }
                    }

                    $target = 'Files/' . $_FILES['imagem']['name'];
                    move_uploaded_file($_FILES['imagem']['tmp_name'], $target);

                    $evento->setImagem($_FILES['imagem']['name']);
                }

                if ($evento->getId() > 0) { //JÁ EXISTE
                    if ($eventoDAO->update($evento)) { // SUCESSO                      
                        $msg = 'Evento Alterado com Sucesso';
                        
                        header('location:?controller=evento&action=listar&status=1&msg='.$msg);
                    } else { //ERRO                         
                        $_SESSION['msg'] = 'Erro ao Alterar';
                    }
                } else { //NOVO
                    if ($eventoDAO->insert($evento)) { //SUCESSO                      
                        $msg = 'Evento Cadastrado com Sucesso';

                        header('location:?controller=evento&action=listar&status=1&msg='.$msg);
                        
                    } else { //ERRO                       
                        $_SESSION['msg'] = 'Erro ao Inserir';
                    }
                }
            } else {               
                $_SESSION['msg'] = 'Alguns erros foram encontrados:<br>' . $msg;
            }

            include_once('View/evento/form.php');
            
        } else {
            header('location:index.php?controller=home&action=index');
        }
    }

    public function novo() {

        if (isset($_SESSION['user']['id'])) { //AUTENTICAÇÃO LOGIN
            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['descricao']);
            unset($_SESSION['local']);
            unset($_SESSION['hora_inicio']);
            unset($_SESSION['imagem']);
            unset($_SESSION['status']);

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
