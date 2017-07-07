<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{

    /**
     * 
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     */
    protected $id;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $user;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $pass;

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }

}
