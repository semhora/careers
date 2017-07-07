<?php

namespace Controller;

use Service\EventService;

class EventController extends AbstractController
{

    public function getForm()
    {
        return $this->render('event/form.php');
    }

    public function postSave()
    {
        $this->getEventService()->save($this->getRequest(), $this->getFiles());

        return "Criado com sucesso!";
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
