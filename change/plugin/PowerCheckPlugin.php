<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;

class PowerCheckPlugin extends Plugin
{
	public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $annotations = $this->annotations->getMethod(

            $dispatcher->getControllerClass(),

            $dispatcher->getActiveMethod()
        );

        if ($annotations->has('Power')) {

            $annotation = $annotations->get('Power');

            $name = $annotation->getNamedParameter('name');
            $type = $annotation->getNamedParameter('type');
            switch ($type) {
                case 'admin':
                    if (!$this->session->get('auth')) {

                        $dispatcher->forward(
                            [
                                'controller' => 'Gallery',
                                'action'     => 'adlogin',
                            ]
                        );

                        return false;
                    }
                    break;
                default:
                    if (!$this->session->get('auth')) {

                        $dispatcher->forward(
                            [
                                'controller' => 'Gallery',
                                'action'     => 'index',
                            ]
                        );

                        return false;
                    }
                    break;
            }

        }
        return true;
    }
}