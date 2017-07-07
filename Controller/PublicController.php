<?php

namespace Controller;

use Service\EventService;

class PublicController extends AbstractController
{

    public function postSave()
    {
        $this->getEventService()->save($this->getRequest(), $this->getFiles());

        return "save";
    }

    public function get()
    {
        $events = $this->getEventService()->getEvents();

        return $this->render('event/list.php', ['events' => $events]);
    }

    public function getDetails($id)
    {
        $event = $this->getEventService()->getEvent($id);

        return $this->render('event/details.php', ['event' => $event]);
    }

}
