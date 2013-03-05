<?php
/**
 * This file is part of the Zend.local_Www_Application_models package.
 *
 * @category   Zend
 * @package    Zend.local_Www_Application_models
 */

/**
 * Application_Model_UsersMapper processing methods to deal with the table
 * @category   Zend
 * @package    Zend.local_Www_Application_models
 * @subpackage UsersMapper
 */

class Application_Model_UsersMapper
{
    /**
     * @var string value table
     */
    protected $_dbTable;

    /**
     * Establishes a new table name
     * @param $dbTable new value for table name
     * @return new value for the table name
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * Return table name
     * @return value for the table name
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Users');
        }
        return $this->_dbTable;
    }

    /**
     * Inser ot Update field values in table name
     * @param $users instance of Application_Model_User
     */
    public function save(Application_Model_User $users)
    {
        $data = array(
            'login'   => $users->getLogin(),
            'pass' => $users->getPass()
        );

        if (null === ($id = $users->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
}

