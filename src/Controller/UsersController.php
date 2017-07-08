<?php
namespace App\Controller;

use App\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Model\Event;

class UsersController extends Controller
{
    public function login(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $response;
    }
}
