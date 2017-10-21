<?php
namespace App\Controllers\Event;

use App\Entities\Event;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use System\Controller\BaseController;

class EventController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function event()
    {
        $id = $this->request->get('id');
        $event = $this->entityManager->getRepository(Event::class)->find((int) $id);

        return view('event/event.php', ['event' => $event]);
    }

    public function newEvent()
    {
        redirectIfNotLogged();
        $data = [];

        if ($this->request->getMethod() === 'POST') {
            $this->registerEvent();
        }

        if ($this->request->get('event')) {
            $data['has_event'] = true;
            $data['event'] = $this->request->get('event');
        }

        return view('event/new_event.php', $data);
    }

    public function registerEvent()
    {
        redirectIfNotLogged();
        $event = new Event();

        /** @var UploadedFile $file */
        $file = $this->request->files->get('image');

        $fileName = '';

        if ($file) {
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(UPLOAD_DIR, $fileName);
        }

        $schedule = \DateTime::createFromFormat('d/m/Y H:i', $this->request->get('schedule'));
        $schedule = !!$schedule ? $schedule : null;

        $event->setName($this->request->get('name'))
            ->setDescription($this->request->get('description'))
            ->setLocal($this->request->get('local'))
            ->setSchedule($schedule)
            ->setImage($fileName)
            ->setStatus($this->request->get('status'));

        $em = initializeDoctrine();

        if (!$em->getRepository(Event::class)->isValid($event)) {
            $this->session->getFlashBag()->set('error', 'Complete todos os dados do formulário.');
            return false;
        }

        $em->persist($event);
        $em->flush();

        return header('Location: ' . getUrl('event_specifc', ['id' => $event->getId()]));
    }
}
