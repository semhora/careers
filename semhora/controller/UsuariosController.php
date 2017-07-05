<?php
namespace controller;

use bo\UserBO;

/*
 * Esta classe de controller para usuarios
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class UsuariosController extends HeaderController{

    /**
     * Variável recebe a instancia do business object \bo\UserBO
     * @access public
     * @name $user
     */
    public $users;

    /**
     * Método construtor - aciona o construtor pai para validar o acesso e instancia o BO
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->users = new UserBO();
    }

    /**
     * Método getAllUsers - aciona o bo para pegar os dados de todos os usuários no banco de dados
     * @access public
     * @return ArrayObject de usuários
     */
    public function getAllUsers(){
        $usersBO = new UserBO();
        return $usersBO->getAll();
    }

    /**
     * Método getByFilter - função que vai pegar todos os posts na bo, com os filtros do campo de busca
     * @access public
     * @return ArrayObject de usuários
    */
    public function getByFilter($filter)
    {
        return $this->users->getUserByFilter($filter);
    }

    /**
     * Método edit - função que vai editar o novo usuario na bo
     * @access public
     * @param Array $request
     * @return Array para tratamento
    */
    public function edit($request)
    {
        $ret = $this->users->change($request);

        if($ret === true){
            $msg["color"] = "alert-success";
            $msg["glyphicon"] = "glyphicon glyphicon-ok";
            $msg["text"] = "Usuário editado com sucesso.";
        }else{
            $msg["color"] = "alert-danger";
            $msg["glyphicon"] = "glyphicon-exclamation-sign";
            $msg["text"] = "Erro ao editar usuário, verifique os campos digitados.";
        }

        return $msg;
    }

    /**
     * Método remove - função que vai remover o usuário no banco de dados
     * @access public
     * @param string $id
     * return boolean
     */
    public function removeUser($id)
    {
        print $this->users->delete($id);
    }

}