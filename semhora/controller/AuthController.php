<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 19/06/2017
 * Time: 20:10
 */

namespace controller;

use bo;

/**
 * Esta classe de controller para as ações de cadastro e login
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class AuthController {

    /**
     * Método login - função que vai logar o usuário na área interna
     * @access public
     * @param Array $post['login'] e $post['pass']
     * @return boolean
    */
    public function login($post)
    {
        $login = new bo\userBO();
        return $login->logIn($post['login'], $post['pass']);
    }

    /**
     * Método registerNewUser - função que vai logar o usuário na área interna
     * @access public
     * @param Array $post com os campos para cadastro de usuário
     * @return boolean
     */
    public function registerNewUser($post)
    {
        $register = new bo\UserBO();
        $ret = $register->register($post);

        if($ret === true){
            header("Location: /semhora/");
        }else if($ret){
            return $ret;
        }else{
            return "ERRO AO CADASTRAR";
        }
    }
} 