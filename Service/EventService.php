<?php

namespace Service;

use Entity\Event;

class EventService extends AbstractService
{

    public function save($request, $files)
    {
        $fileService = new FileService();

        $imgName = $fileService->uploadImage($files);

        $event = new Event();

        $event->setName($request['name'])
            ->setDescription($request['description'])
            ->setLocality($request['locality'])
            ->setStartHour($request['startHour'])
            ->setImg($imgName)
            ->setStatus($request['status']);

        $this->getEntityManager()->persist($event);
        $this->getEntityManager()->flush();
    }

    public function getEvents()
    {
        return $this->getEntityManager()
                ->getRepository('Entity\Event')
                ->findAll();
    }

    public function getEvent($id)
    {
        return $this->getEntityManager()
                ->getRepository('Entity\Event')
                ->find($id);
    }

}
