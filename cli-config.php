<?php
require_once __DIR__ . '/config/bootstrap.php';
use Doctrine\DBAL\Migrations\Configuration\Configuration;


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(initializeDoctrine());
