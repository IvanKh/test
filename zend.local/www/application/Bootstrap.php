<?php
/**
 * This file is part of the Zend.local_Www_Application package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application
 */

/**
 * Bootstrap initializes the session
 *
 * @category   Zend
 * @package    Zend.local_Www_Application
 */

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Starting Zend_Session
    */
    protected function _initSession()
    {
        Zend_Session::start();
    }
}

