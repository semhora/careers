<?php
use Cake\Datasource\ConnectionManager;

$dsn = 'mysql://root:root@localhost/sem_hora';
ConnectionManager::config('default', ['url' => $dsn]);
