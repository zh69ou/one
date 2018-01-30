<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * @RoutePrefix('/')
 */
class AloneindexController extends Controller
{
	/**
     * @Route(
     *     '/',
     *	   methods={'GET'},
     *     name='index'
     * )
     */
    public function indexAction()
    {
        // $this->cookies->set('remember-me', $this->crypt->encrypt('abc'), time() + 15 * 86400 );
        // $cachename = 'index';
        // if(!$this->view->getCache($cachename)){
        //     $this->view->name=time();
        // }
        // $this->view->cache(["key" => $cachename]);
        return $this->view->render('base/alone/index');
    }

    public function error404Action()
    {
    	$response = new Response();
    	$response->setContent('404 no fond');
    	return $response;
    }
}