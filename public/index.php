<?php 

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('CORE', APP . 'core' . DIRECTORY_SEPARATOR);
define('CONFIG', APP . 'config' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR);
define('MODEL', APP . 'model' . DIRECTORY_SEPARATOR);
define('EXCEPTION', APP . 'exception' . DIRECTORY_SEPARATOR);
define('UTILS', APP . 'utils' . DIRECTORY_SEPARATOR);
define('APIS', APP . 'apis' . DIRECTORY_SEPARATOR);
define('EXECUTOR', APP . 'executor' . DIRECTORY_SEPARATOR);
$modules = [ROOT, APP, CORE, CONFIG, CONTROLLERS, MODEL, EXCEPTION, UTILS, APIS, EXECUTOR];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload', true);
App::run();

?>