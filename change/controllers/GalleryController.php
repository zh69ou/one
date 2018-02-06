<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * @RoutePrefix('/gallery')
 */
class GalleryController extends Controller
{
	/**
     * @Route(
     *     '/',
     *	   methods={'GET'},
     *     name='login'
     * )
     */
    public function indexAction()
    {
        // $this->persistent->abc = 'zhou';
    	return $this->view->render('base/alone/login');
    }
	/**
     * @Route(
     *     '/adlogin',
     *	   methods={'GET'},
     *     name='adlogin'
     * )
     */
    public function adloginAction()
    {
    	return $this->view->render('base/admin/login');
    }
	/**
     * @Route(
     *     '/regin',
     *	   methods={'GET'},
     *     name='regin'
     * )
     */
    public function reginAction()
    {}
	/**
     * @Route(
     *     '/logout',
     *	   methods={'GET'},
     *     name='logout'
     * )
     */
    public function logoutAction()
    {}
}