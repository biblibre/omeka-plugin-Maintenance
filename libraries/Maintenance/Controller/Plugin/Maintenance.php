<?php

class Maintenance_Controller_Plugin_Maintenance extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $user = current_user();

        if (empty($user) && $controller != 'users' && $action != 'login') {
            $request->setActionName('index');
            $request->setModuleName('maintenance');
            $request->setControllerName('index');
        }
    } 
}
