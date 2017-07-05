<?php

namespace App\Models;

use Core\BaseModel;

class Evento extends BaseModel
{
    protected $table = "eventos";

    public function save($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO eventos VALUES(:id, :nome, :local, :img, :descricao)");

        $stmt->execute(array(
            ':id' => null,
            ':nome' => $data->nome,
            ':local' => $data->local,
            ':img' => $data->img,
            ':descricao' => $data->descricao
        ));

    }
}