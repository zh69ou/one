<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * @RoutePrefix('/{firmname:(?!admin|help|gallery|news)\w+}')
 */
class FirmindexController extends Controller
{
	/**
     * @Route(
     *     '/',
     *	   methods={'GET'},
     *     name='firmeindex'
     * )
     */
    public function firmindexAction()
    {
        // return $this->view->render('base/admin/index');
        $response = new Response();
    	$response->setContent(
            'firmindex'
        );
    	return $response;
    }
    /**
     * @Route(
     *     '/news/{id:[0-9]+}',
     *	   methods={'POST','GET'},
     *     name='firmnews'
     * )
     */
    public function firmnewsAction($id)
    {
    	$response = new Response();
    	$response->setContent(
            'bbc'.$id
        );
    	return $response;
    }
}