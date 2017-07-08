<?php
namespace App\Controller;

use App\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Model\Event;

class EventsController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $Event = new Event();
        $events = $Event->getAll();
        $html = $this->templateEngine->render('Events/index', compact('events'));
        $response->getBody()->write($html);
        return $response;
    }

    public function details(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $Event = new Event();
        $event = $Event->getById($args['id']);
        $event = reset($event);
        $html = $this->templateEngine->render('Events/details', compact('event'));
        $response->getBody()->write($html);
        return $response;
    }

    public function add(ServerRequestInterface $request, ResponseInterface $response)
    {
        $html = $this->templateEngine->render('Events/add');
        $response->getBody()->write($html);
        return $response;
    }

    public function save(ServerRequestInterface $request, ResponseInterface $response)
    {
        $event = $request->getParsedBody();
        $eventFile = $request->getUploadedFiles()['img'];
        $Event = new Event();
        if (!$Event->save($event, $eventFile)) {
            $response->getBody()->write('<h1>Não foi possivel salvar o evento</h1>');
            return $response;
        }
        $response->getBody()->write('<h1>Evento salvo com sucesso!</h1>');
        return $response;
    }
}
