<?php
/**
 * arquivo com as configurações de autoload, template engine e constantes do sistema
 *
 * @author Diego Andrade <diegogandradex@gmail.com>
 * @version 0.1
 */
session_start();
define ('FULL_PATH', __DIR__."\\..\\");
define('SMARTY_DIR', FULL_PATH.'libs/smarty-3.1.30/libs/');

require_once FULL_PATH."libs/Aura.Autoload-2.x/autoload.php";
require_once SMARTY_DIR."Smarty.class.php";

$smarty = new Smarty();
$smarty->template_dir = FULL_PATH.'/views/templates/';
$smarty->compile_dir = FULL_PATH.'/views/templates_c/';
$smarty->config_dir = FULL_PATH.'/views/configs/';
$smarty->cache_dir = FULL_PATH.'/views/cache/';

// instantiate
$loader = new \Aura\Autoload\Loader;

$loader->addPrefix('bo', FULL_PATH.'classes/bo/');
$loader->addPrefix('dao', FULL_PATH.'classes/dao/');
$loader->addPrefix('vo', FULL_PATH.'classes/vo/');
$loader->addPrefix('util', FULL_PATH.'classes/util/');
$loader->addPrefix('controller', FULL_PATH.'controller/');

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();