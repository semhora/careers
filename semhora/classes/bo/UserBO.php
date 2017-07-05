<?php

namespace bo;

use dao;
use vo;

/**
 * Classe bo de usuários (business object) para implantar lógicas e fazer a comunicação entre a controller e a classe do banco de dados
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class UserBO extends dao\UserDAO
{

    /**
     * Método logIn - metodo que valida o login do usuário
     * @access public
     * @param  String $login
     * @patam String $pass
     * @return boolean
    */
    public function logIn($login, $pass)
    {

        $filter['login'] = (filter_var($login, FILTER_SANITIZE_STRING));
        $filter['pass'] = md5(trim((filter_var($pass, FILTER_SANITIZE_STRING))));
        $user = $this->get($filter);

        if($user){

            $this->updateLastLogin($user->getId());

            $_SESSION['user'] = json_encode($user);
            $success = true;

        }else
            $success = false;

        return $success;
    }

    /**
     * Método remove - método que irá remover o usuario selecionado
     * @access public
     * @param Int id
     * @return void
     */
    public function remove($id)
    {
        print $this->delete($_POST['id']);
    }

    /**
     * Método auth - metodo que verifica a autenticidade do usuário
     * @access public
     * @return boolean
    */
    public function auth()
    {

        if(isset($_SESSION['user'])){
            $user = json_decode($_SESSION['user']);

            $filter['login'] = $user->login;
            $filter['pass'] = $user->pass;

            $success = ($this->get($filter)) ? true : false;

        }else{

            $success = false;
        }

        return $success;

    }

    /**
     * Método auth - metodo que valida e registra o usuário
     * @access public
     * @return boolean
    */
    public function register($request)
    {

        $user = $this->validateUser($request);

        if($user instanceof vo\UserVO){
            $login = $user->getLogin();

            if($this->validaLogin($login)){
                if($this->insert($user))
                {
                    $_SESSION['user'] = json_encode($user);
                    $ret = true;
                }else{
                    $ret = false;
                }
            }else{
                $ret = "usuario já cadastrado.";
            }

        }else{
            $ret = false;
        }

        return $ret;
    }

    /**
     * Método auth - metodo que valida e chama a alteração do usuário
     * @access public
     * @return boolean
    */
    public  function change($request)
    {
        $user = $this->validateUser($request);

        return ($user instanceof vo\UserVO) ?
                    $this->update($user) : false;
    }

    /**
     * Método auth - metodo que valida os campos do usuário
     * @access public
     * @return boolean
    */
    private function validateUser($request)
    {

        $user = new \vo\UserVO;
        $erro = false;

        if(isset($request['id']) && filter_var($request['id'], FILTER_SANITIZE_NUMBER_INT))
            $user->setId($request['id']);

        if(isset($request['nome']) && filter_var($request['nome'], FILTER_SANITIZE_STRING))
            $user->setName($request['nome']);
        else
            $erro = true;

        if(isset($request['login']) && filter_var($request['login'], FILTER_SANITIZE_STRING))
            $user->setLogin ($request['login']);
        else
            $erro = true;

        if(isset($request['email']) && filter_var($request['email'], FILTER_VALIDATE_EMAIL))
            $user->setEmail ($request['email']);
        else
            $erro = true;

        if(isset($request['password']) && filter_var($request['password'], FILTER_SANITIZE_STRING))
            $user->setPass (md5(trim($request['password'])));
        else
            $erro = true;

        return ($erro) ? false : $user;
    }

    /**
     * Método getPosts - método que irá pegar os posts de acordo com os filtros de titulo, autor, caminho e corpo do post
     * @access public
     * @param  Array $filter
     * @return ArrayObject PostVO;
    */
    public function getUserByFilter($filter)
    {
        $filter = filter_var_array($filter,FILTER_SANITIZE_STRING);
        return $this->get($filter);
    }
}