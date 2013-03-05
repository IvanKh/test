<?php
/**
 * This file is part of the Zend.local_Www_Application_forms package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_forms
 */
/**
 * Application_Form_Login Zend form for user authentication
 * @category   Zend
 * @package    Zend.local_Www_Application_forms
 * @subpackage Login
 */
class Application_Form_Login extends Zend_Form
{
/**
 *Generate new Zend Form with specified properties
 */
    public function init()
    {
        $this->setName('login');
        $isEmptyMessage = 'Value is required and can not be empty ';
        $username = new Zend_Form_Element_Text('login');
        $username->setLabel('Login:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
            array('messages' => array('isEmpty' => $isEmptyMessage))
        );

        $password = new Zend_Form_Element_Password('pass');
        $password->setLabel('Password:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
            array('messages' => array('isEmpty' => $isEmptyMessage))
        );

        $submit = new Zend_Form_Element_Submit('enter');
        $submit->setLabel('Submit');
        $this->addElements(array($username, $password, $submit));
        $this->setMethod('post');
    }

}

