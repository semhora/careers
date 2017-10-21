<?php
namespace App\Repositories;

use App\Entities\Event;
use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
    public function isValid(Event $event)
    {
        return !(!$event->getName()
            || !$event->getDescription()
            || !$event->getLocal()
            || !$event->getSchedule()
            || !$event->getImage()
            || !$event->getStatus()
        );
    }
}
