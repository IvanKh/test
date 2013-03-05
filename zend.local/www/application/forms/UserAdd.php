<?php
/**
 * This file is part of the Zend.local_Www_Application_forms package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_forms
 */
/**
 * Application_Form_UserAdd creates a form for user registration
 * @category   Zend
 * @package    Zend.local_Www_Application_forms
 * @subpackage UserAdd
 */
class Application_Form_UserAdd extends Zend_Form
{

    public function init()
    {
        $this->setName('UserAdd');
        $id = new Zend_Form_Element_Hidden('id');
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Login')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $pass = new Zend_Form_Element_Text('pass');
        $pass->setLabel('Password')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $login, $pass, $submit));
    }


}

