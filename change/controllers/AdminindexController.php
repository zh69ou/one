<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * @RoutePrefix('/admin')
 */
class AdminindexController extends Controller
{
	/**
     * @Route(
     *     '/',
     *	   methods={'GET'},
     *     name='adminindex'
     * )
     * @Power(name='adminindex' ,type='admin')
     */
    public function adminindexAction()
    {
        return $this->view->render('base/admin/index');
    }
    /**
     * @Route(
     *     '/news/{id:[0-9]+}',
     *	   methods={'POST','GET'},
     *     name='adminnews'
     * )
     */
    public function newsAction($id)
    {
    	$response = new Response();
    	$response->setContent(
            'bbc'.$id
        );
    	return $response;
    }
}