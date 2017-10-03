<?php

use Application\Src\AppClass\AppInit;

/**
 * Início da aplicação - Teste Sem Hora
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package public
 */

require_once '../vendor/autoload.php';

$appInit = new AppInit();
echo $appInit->run();