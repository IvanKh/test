<?php
/**
 * Bootstrap initializes the session
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license   BSD License
 */

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initSession()
    {
        Zend_Session::start();
    }
}

