/**
* This file is part of the Zend.local_Www_Application_views_helpers package.
*
* @category   Zend
* @package    Zend.local_Www_public package_css
*
*/
/**
* Zend_View_Helper_BaseUrl is a simple view helper that retrieves the base URL from Zend_Controller_Front.
*
* @category   Zend
* @package    Zend.local_Www_public package_css
* @subpackage BaseUrl
* @return base URL from Zend_Controller_Front
*/
class Zend_View_Helper_BaseUrl
{
    function baseUrl()
    {
        $front = Zend_Controller_Front::getInstance();
        return $front->getBaseUrl();
    }
}