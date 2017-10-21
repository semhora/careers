<?php
namespace App\Controllers\Admin;

use App\Entities\User;
use System\Controller\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirectIfNotLogged();
        return view('admin/index.php');
    }

    public function user()
    {
        redirectIfNotLogged();
        if ($this->request->getMethod() === 'POST') {
            $userRepository = $this->entityManager->getRepository(User::class);

            try {

                $userRepository->registerUser($this->request->request->all(), $this->entityManager);
                header('Location: ' . getUrl('home'));
            } catch (\Exception $e) {

                session()->getFlashBag()->set('error', $e->getMessage());
            }
        }

        return view('admin/user_new.php');
    }

    public function list()
    {
        redirectIfNotLogged();
        $users = $this->entityManager->getRepository(User::class)->findAll();

        return view('admin/users.php', ['users' => $users]);
    }
}
