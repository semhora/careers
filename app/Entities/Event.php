<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Events
 * @package App\Entities
 *
 * @ORM\Entity(repositoryClass="App\Repositories\EventRepository")
 * @ORM\Table("events")
 */
class Event
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(
     *     targetEntity="User",
     *     inversedBy="events"
     * )
     * @ORM\JoinColumn(
     *     name="user_id",
     *     referencedColumnName="id"
     * )
     */
    protected $userId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $local;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $schedule;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $image;

    /**
     * @var string
     * @ORM\Column(type="boolean")
     */
    protected $status;

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
     * @return Event
     */
    public function setId(int $id): Event
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->userId;
    }

    /**
     * @param User $userId
     * @return Event
     */
    public function setUser(User $userId): Event
    {
        $this->userId = $userId;
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
     * @return Event
     */
    public function setName(string $name): Event
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Event
     */
    public function setDescription(string $description): Event
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocal(): string
    {
        return $this->local;
    }

    /**
     * @param string $local
     * @return Event
     */
    public function setLocal(string $local): Event
    {
        $this->local = $local;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSchedule(): \DateTime
    {
        return $this->schedule;
    }

    /**
     * @param \DateTime $schedule
     * @return Event
     */
    public function setSchedule(?\DateTime $schedule): Event
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Event
     */
    public function setImage(string $image): Event
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Event
     */
    public function setStatus(string $status): Event
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredAt(): \DateTime
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTime $registeredAt
     * @return Event
     */
    public function setRegisteredAt(\DateTime $registeredAt): Event
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
     * @return Event
     */
    public function setUpdatedAt(\DateTime $updatedAt): Event
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
