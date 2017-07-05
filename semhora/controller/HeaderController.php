<?php
namespace controller;

use bo\UserBO;
/**
 * Esta classe de controller que faz as verificações de segurança
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class HeaderController
{
    /**
     * Variável recebe a sessão do usuário
     * @access public
     * @name $user
    */
    public $user;

    /**
     * Método construtor - verifica se é necessário validar se o usuário está logado e popula a variável do usuário
     * @access public
     * @param boolean $logadl para informar se é necessário validar. true = logado | false = deslogado
     * @return void
     */
    public function __construct($logado = true)
    {
        try{
            if($logado){
                $auth = new UserBO;
                if(!$auth->auth() && $_SERVER['SCRIPT_NAME'] !== "/semhora/login")
                    $this->logout();

                $this->user = json_decode($_SESSION['user']);
            }


        } catch (Exception $ex) {

        }
    }

    /**
     * Método logour - desloga o usuário
     * @access public
     * @return boolean
     */
    public function logout()
    {
        session_unset();
        session_destroy();

        print "<script>window.location= '/semhora/login';</script>";
    }
}