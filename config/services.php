<?php
use Phalcon\Crypt;
use Phalcon\Cache\Backend\File;
use Phalcon\Cache\Frontend\Output as OutputFrontend;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Router\Annotations as RouterAnnotations;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\View\Simple as SimpleView;
use Phalcon\Security;

$di->setShared('config', function () {

    $config = include BASE_PATH . '/config/config.php';

    return $config;
});

$di['dispatcher'] = function () {
    $eventsManager = new EventsManager();

    $eventsManager->attach(
        'dispatch',
        new PowerCheckPlugin()
    );

    $dispatcher = new MvcDispatcher();

    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
};

$di['router'] = function () {
    $router = new RouterAnnotations(false);
    $router->addResource('Aloneindex', '/');
    $router->addResource('Adminindex', '/');
    $router->addResource('Firmindex', '/');
    $router->addResource('Gallery', '/');
    $router->notFound(
        [
            'controller' => 'Aloneindex',
            'action'     => 'error404',
        ]
    );
    return $router;
};

$di->set('voltService', function ($view, $di) {
	$c = $this->getConfig();
    $volt = new Volt($view, $di);

    $volt->setOptions(
        [
            'compiledPath'      => $c->cache->temp,
            'compiledExtension' => '.compiled',
        ]
    );

    return $volt;
});

$di->set('view', function () {
	$c = $this->getConfig();
    $view = new SimpleView();
    $view->setViewsDir($c->app->viewsDir);
    $view->registerEngines(
        [
            '.phtml' => 'voltService',
        ]
    );
    return $view;
});

$di->set('viewCache', function () {
	$c = $this->getConfig();
    $frontCache = new OutputFrontend(
        [
            'lifetime' => $c->cache->viewtime,
        ]
    );
    $cache = new File($frontCache, array(
        "cacheDir" => $c->cache->view,
        "prefix" => $c->cache->viewprefix
    ));
    return $cache;
});

$di->set('cookies', function () {
    $cookies = new Cookies();

    $cookies->useEncryption(false);

    return $cookies;
});

$di->set('crypt', function () {
	$c = $this->getConfig();
    $crypt = new Crypt();
    $crypt->setKey($c->security->cryptstr);
    return $crypt;
});

$di->set('security', function () {
    $security = new Security();

    $security->setWorkFactor(12);

    return $security;
},true);

$di->setShared('session', function () {
    $session = new \Phalcon\Session\Adapter\Files();

    $session->start();

    return $session;
});

$di->set('db', function () {
	$c = $this->getConfig();
    return new DbAdapter(
        [
            'host'     => $c->db->host,
            'username' => $c->db->username,
            'password' => $c->db->password,
            'dbname'   => $c->db->dbname,
        ]
    );
});
