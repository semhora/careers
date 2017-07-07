<?php

namespace Service;

use Doctrine\ORM\EntityManager;
use Factory\EntityManagerFactory;

abstract class AbstractService
{

    /**
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * 
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (isset($this->entityManager)) {
            return $this->entityManager;
        }
        $this->entityManager = EntityManagerFactory::create();
        return $this->entityManager;
    }

}
