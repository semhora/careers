<?php

namespace Controller;

use Service\UserService;

class UserController extends AbstractController
{

    public function getForm()
    {
        return $this->render('user/form.php');
    }

    public function postSave()
    {
        $service = new UserService();

        $service->save($this->getRequest());

        return "save";
    }

}
