<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entities
 *
 * @ORM\Entity(repositoryClass="App\Repositories\UserRepository")
 * @ORM\Table("users")
 */
Class User {

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @var \DateTime
     * @ORM\Column(
     *     type="datetime",
     *     name="registered_at"
     * )
     */
    protected $registeredAt;

    /**
     * @var \DateTime
     * @ORM\Column(
     *     type="datetime",
     *     name="updated_at",
     * )
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->registeredAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredAt(): \DateTime
    {
        if (! ($this->registeredAt instanceof \DateTime)) {
            $this->registeredAt = \DateTime::createFromFormat('Y-m-d H:i:s', $this->registeredAt);
        }
        return $this->registeredAt;
    }

    /**
     * @param \DateTime $registeredAt
     * @return User
     */
    public function setRegisteredAt(\DateTime $registeredAt): User
    {
        $this->registeredAt = $registeredAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt(\DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
