<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Evento;
use Core\Container;
use Core\Database;

class EventosController extends BaseController
{
    public function mostrar($id)
    {
        $model = new Evento(Database::getConexao());

        $this->view->evento = $model->get($id);

        $this->render("evento/mostrar","layout");

    }

    public function novo($request)
    {
        if(isset($request->post))
        {
            $helper =  Container::newHelper("Upload");
            $nomeImg = $helper->uploadImg("img");

            $request->post->img = $nomeImg;

            $model = new Evento(Database::getConexao());

            $model->save($request->post);

            header("location:/");

        }

        $this->render("evento/criar","layout");
    }



}