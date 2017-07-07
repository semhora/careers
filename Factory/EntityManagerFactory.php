<?php

namespace Factory;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{

    public static function create()
    {
        $isDevMode = true;
        $config    = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../Entity"), $isDevMode, null, null, false);

        $conn = array(
            'dbname'   => DBNAME,
            'user'     => DBUSER,
            'password' => DBPASS,
            'host'     => 'localhost',
            'driver'   => 'pdo_mysql',
        );

        return $entityManager = EntityManager::create($conn, $config);
    }

}
