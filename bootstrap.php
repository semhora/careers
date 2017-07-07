<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Factory\EntityManagerFactory;

require_once 'vendor/autoload.php';
require_once 'Autoloader.php';
Autoloader::register();

$entityManager = EntityManagerFactory::create();
return ConsoleRunner::createHelperSet($entityManager);
