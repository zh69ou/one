<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

define('BASE_PATH', dirname(__DIR__));
define('CHANGE_PATH', BASE_PATH . '/change');

try {

    $di = new FactoryDefault();

    include BASE_PATH . "/config/services.php";

    include BASE_PATH . "/config/loader.php";

    $application = new Application($di);

    $application->useImplicitView(false);

    $response = $application->handle();

    $response->send();

} catch (\Exception $e) {

    echo 'Exception: ', $e->getMessage();

}