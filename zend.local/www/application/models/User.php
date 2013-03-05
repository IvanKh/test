<?php
/**
 * This file is part of the Zend.local_Www_Application_models package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_models
 */
/**
 * Application_Model_User model for working with the table columns
 * @category   Zend
 * @package    Zend.local_Www_Application_models
 * @subpackage User
 */
class Application_Model_User
{
    /**
     * @var string value table column 'login'
     */
    protected $_login;
    /**
     * @var string value table column 'password'
     */
    protected $_pass;
    /**
     * @var integer value table column 'id'
     */
    protected $_id;

    /**
     * @param $text new value for the field 'login'
     * @return new value for the field 'login'
     */
    public function setLogin($text)
    {
        $this->_login = (string) $text;
        return $this;
    }

    /**
     * @return value for the field 'login'
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * @param $pass new value for the field 'pass'
     * @return new value for the field 'pass'
     */
    public function setPass($pass)
    {
        $this->_pass = (string) $pass;
        return $this;
    }

    /**
     * @return value for the field 'pass'
     */
    public function getPass()
    {
        return $this->_pass;
    }

    /**
     * @param $id new value for the field 'id'
     * @return new value for the field 'id'
     */
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    /**
     * @return value for the field 'id'
     */
    public function getId()
    {
        return $this->_id;
    }

}

