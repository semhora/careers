<?php
namespace vo;
/*
 * Classe vo (view object) para gerar os setters e getters do objeto user
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
class UserVO{
    
    public $id;

    public $name;

    public $login;

    public $email;

    public $pass;

    public $createdDate;

    public $lastLogin;
    
    function __construct($id = "", $name = "", $login = "", $email = "", $pass = "", $createdDate = "", $lastLogin = "") {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->pass = $pass;
        $this->createdDate = $createdDate;
        $this->lastLogin = $lastLogin;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }
    
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }




}