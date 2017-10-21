<?php
namespace App\Controllers\Login;

use App\Entities\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use System\Controller\BaseController;

class LoginController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->request->getMethod() === 'POST') {
            $this->login();
        }
        return view('login/login.php');
    }

    public function login()
    {
        $email = $this->request->get('email');
        $password = $this->request->get('password');

        if (!$email || !$password) {
            $this->session->getFlashBag()->set('error', 'Ambos campos são obrigatórios.');
            return false;
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'email' => $email
        ]);

        if (! $user instanceof User) {
            $this->session->getFlashBag()->set('error', 'Usuário não encontrado.');
            return false;
        }

        if (!password_verify($password, $user->getPassword())) {
            $this->session->getFlashBag()->set('error', 'Usuário não encontrado.');
            return false;
        }

        $this->session->set('logged', true);
        $this->session->set('username', $user->getName());
        $this->session->set('email', $user->getEmail());
        $this->session->set('user', serialize($user));

        header('Location: ' . getUrl('admin'));

        return true;
    }

    public function logout()
    {
        $this->session->clear();
        $this->session->invalidate();

        header('Location: ' . getUrl('home'));
    }
}
