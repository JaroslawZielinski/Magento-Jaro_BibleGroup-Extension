<?php

/**
 * Class Jaro_BibleTeacher_Controller_AbstractController
 */
class Jaro_BibleTeacher_Controller_AbstractController extends Mage_Core_Controller_Front_Action
{
    /**
     *
     */
    protected function _canRender()
    {
//        $sessionCustomer = Mage::getSingleton("customer/session");
//        if (!$sessionCustomer->isLoggedIn()) {
//            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account'));
//        }

        return $this;
    }

    /**
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        return $this
            ->_canRender()
            ->loadLayout();
    }

    /**
     * @return Mage_Core_Model_Abstract|Mage_Core_Model_Session
     */
    protected function _getSession()
    {
        return Mage::getSingleton('core/session');    
    }
}
