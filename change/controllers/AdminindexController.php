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
     *     methods={'POST','GET'},
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
    /**
     * @Route(
     *     '/clear',
     *     methods={'GET','GET'},
     *     name='adminclear'
     * )
     */
    public function clearAction()
    {
        $response = new Response();
        if($this->cleartemp($this->config->cache->base)===true)
        {
            $response->setContent('清理完成');
        }else{
            $response->setContent('清理失败');
        }
        return $response;
    }

    private function cleartemp($dir='')
    {
        try{
            if(is_dir($dir))
            {
                $file = opendir($dir);
                while (($filename = readdir($file))!== false)
                {
                    if($filename!='.'&&$filename!='..')
                    {
                        if(is_file($dir.$filename))
                        {
                            unlink($dir.$filename);
                        }else{
                            $this->cleartemp($dir.$filename.'/');
                        }
                    }
                }
                closedir($file);
            }
            return true;
        }catch (Exception $e) {
            return false;
        }
    }
}