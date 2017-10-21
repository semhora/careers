<?php
namespace App\Controllers;

use App\Entities\Event;
use System\Controller\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $events = $this->entityManager->getRepository(Event::class)->findBy([], ['schedule' => 'ASC']);
        return view('home/index.php', ['events' => $events]);
    }
}
