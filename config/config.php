<?php

return [
    'db' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '101010',
        'dbname' => 'semh',
    ],

    'view' => [
        'dir' => __DIR__ . '/../app/Views/',
    ],

    'controllers' => [
        'dir' => __DIR__ . '/../app/Controllers/',
    ],
];
