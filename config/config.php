<?php

use Phalcon\Config;

return new Config([
	'db' => [
		'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => '123456',
        'dbname'   => 'phalcon'
	],
    'app' => [
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'viewsDir'       => BASE_PATH . '/theme/',
    ],
    'security' => [
        'cryptstr'      => '#zh/&/change$=dp?.$'
    ],
    'cache' => [
        'base'          =>  BASE_PATH."/cache/",
    	'view'			=>	BASE_PATH."/cache/views/",
    	'viewtime'		=>	10,//86400
    	'viewprefix'	=>	"temp_",
    	'temp'			=>  BASE_PATH . '/cache/templates/'
    ]
]);