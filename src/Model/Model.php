<?php
namespace App\Model;

use Cake\Datasource\ConnectionManager;

class Model
{
    public $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionManager::get('default');
    }

    public function find()
    {
        return $this->connection
            ->newQuery();
    }
}
