<?php

namespace Controller;

use Service\UserService;

class AuthController extends AbstractController
{

    public function getLogin()
    {
        return $this->render('login.php');
    }

    public function postAuthenticate()
    {
        $service = new UserService();

        $user = $service->getUserByLogin($this->getRequest()['user'], $this->getRequest()['pass']);

        if ($user) {
            $_SESSION['auth'] = $user->getId();
        }

        header("Location: /admin/event/form");
    }

}
