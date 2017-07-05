<?php

namespace App\Controllers;
use App\Models\Evento;
use Core\BaseController;
use Core\Database;

class HomeController extends BaseController
{

    public function index()
    {
        $model = new Evento(Database::getConexao());

        $this->view->eventos = $model->all();

        $this->render("home/index","layout");
    }


}