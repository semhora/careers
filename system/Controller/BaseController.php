<?php
namespace System\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class BaseController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var Session
     */
    protected $session;

    public function __construct()
    {
        $this->request = request();
        $this->response = response();
        $this->entityManager = initializeDoctrine();
        $this->session = session();
    }
}
