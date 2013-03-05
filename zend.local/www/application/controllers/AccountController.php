<?php
/**
 * This file is part of the Zend.local_Www_Application_Controllers package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_Controllers
 *
 */

/**
 * AccountController engaged in registration and authorization
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_Controllers
 * @subpackage AccountCountroller
 */
class AccountController extends Zend_Controller_Action
{
    /**
     * Action when user entered to project
     */
    public function indexAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('login-ok');
        }
    }

    /**
     * Action when login is successful
     */
    public function loginOkAction()
    {
        $this->view->title = 'LogedIn';
     }

    /**
     * Action registration new user
     * create Zend_from for registration new user if the fields are not filled correctly
     * if fields are filled in correctly redirect indexAction()
     */
    public function useraddAction()
    {
        $this->view->title = "Registration new user";

        $form = new Application_Form_UserAdd();
        $form->submit->setLabel('Add New User');
        $this->view->form = $form;

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $mapper = new Application_Model_UsersMapper();
                $user = new Application_Model_User();

                $user->setLogin($this->getParam('login'));
                $user->setPass($this->getParam('pass'));

                $mapper->save($user);

                $this->redirect('/account/');
            } else {
                $form->populate($formData);
            }
        }
    }

    /**
     * Action show login form
     * @throws exceptionclass [You entered an invalid user name or password] password or username do not match
     * @return loginOkAction()
     * @return exceptionclass
     */
    public function loginAction()
    {
        $this->view->title = 'Login';
        $form = new Application_Form_Login();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $state = $this->authAdapter($this->getRequest()->getPost('login'),
                    $this->getRequest()->getPost('pass'));
                if ($state){
                    $this->_helper->redirector('login-ok', 'account');
                } else {
                    $this->view->errMessage = 'You entered an invalid user name or password';
                }
            }
        }
    }

    /**
     * Function authentication for user
     *
     * @param string $login user login
     * @param string $pass user password
     * @return true if user authentication is ok
     * @return false if user authentication is bad
     */
    protected function authAdapter($login, $pass)
    {
       $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

        $authAdapter->setTableName('users')
            ->setIdentityColumn('login')
            ->setCredentialColumn('pass');

        $authAdapter->setIdentity($login)
            ->setCredential($pass);

        $auth = Zend_Auth::getInstance();

        $result = $auth->authenticate($authAdapter);

        if ($result->isValid()) {
            $identity = $authAdapter->getResultRowObject();
            $authStorage = $auth->getStorage();
            $authStorage->write($identity);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Action logout
     *
     * @return redirect to indexAction()
     */
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect('/account/');
    }
}













