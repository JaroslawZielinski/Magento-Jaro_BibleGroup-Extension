<?php

/**
 * Class Jaro_BibleTeacher_Adminhtml_IndexController
 */
class Jaro_BibleTeacher_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    /**
     * 
     */
    public function indexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('jaro_bible/jaro_bibleteacher_teachings')
            ->_title(Mage::helper('jaro_bibleteacher')->__('Jaro'))->_title(Mage::helper('jaro_bibleteacher')->__('Single Verse'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('Jaro'), Mage::helper('jaro_bibleteacher')->__('Single Verse'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('Single Verse'), Mage::helper('jaro_bibleteacher')->__('Single Verse'));
        $this->renderLayout();
    }

    /**
     *
     */
    public function verseAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     *
     */
    public function operationAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * ACL check
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/jaro_bible/jaro_bibleteacher_single');
    }
}
