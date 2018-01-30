<?php
use Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs(
    [
        CHANGE_PATH . '/controllers/',
        CHANGE_PATH . '/models/',
        CHANGE_PATH . '/plugin/',
    ]
);
$loader->register();

require_once BASE_PATH . '/vendor/autoload.php';