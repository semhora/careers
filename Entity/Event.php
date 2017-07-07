<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 */
class Event
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
    protected $name;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $description;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $locality;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $startHour;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $img;

    /**
     * 
     * @ORM\Column(type="string") 
     */
    protected $status;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocality()
    {
        return $this->locality;
    }

    public function getStartHour()
    {
        return $this->startHour;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setLocality($locality)
    {
        $this->locality = $locality;
        return $this;
    }

    public function setStartHour($startHour)
    {
        $this->startHour = $startHour;
        return $this;
    }

    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

}
