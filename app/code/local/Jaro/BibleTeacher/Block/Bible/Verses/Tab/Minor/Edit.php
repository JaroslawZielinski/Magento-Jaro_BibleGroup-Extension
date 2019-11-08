<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Edit
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * @var null
     */
    protected $_teachingsId = null;

    /**
     * @var null
     */
    protected $_majorId = null;

    public function __construct()
    {
        $this->_teachingsId = $this->getRequest()->getParam('teachings_id');
        $this->_majorId = $this->getRequest()->getParam('major_id');
        // $this->_objectId = 'id';
        parent::__construct();
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_minor';
        $this->_mode = 'edit';
        $modelTitle = $this->_getModelTitle();
        $this->_updateButton('save', 'label', $this->_getHelper()->__("Save $modelTitle"));
        $this->_addButton('saveandaddnew', array(
            'label' => $this->_getHelper()->__('Save and Add New'),
            'onclick' => 'saveAndAddNew()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndAddNew(){
                editForm.submit($('edit_form').action+'back/new/');
            }
        ";
    }

    protected function _getHelper()
    {
        return Mage::helper('jaro_bibleteacher');
    }

    protected function _getModel()
    {
        return Mage::registry('jaro_bibleteacher_minor_verses');
    }

    protected function _getModelTitle()
    {
        return 'Verse';
    }

    public function getHeaderText()
    {
        $model = $this->_getModel();
        $majorVerse = Mage::getModel('jaro_bibleteacher/verses')->load($this->_majorId);

        $modelTitle = $this->_getModelTitle();
        if ($model && $model->getId()) {
            return $this->_getHelper()->__("Edit Minor $modelTitle (for ". Mage::helper('jaro_bibleteacher')->getVersesHelper()->getSiglaByVerse($majorVerse) . ")");
        } else {
            return $this->_getHelper()->__("New Minor $modelTitle (for ". Mage::helper('jaro_bibleteacher')->getVersesHelper()->getSiglaByVerse($majorVerse) . ")");
        }
    }


    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/adminhtml_minor/index', [
            'teachings_id' => $this->_teachingsId,
            'major_id' => $this->_majorId
        ]);
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/adminhtml_minor/delete', [
            $this->_objectId => $this->getRequest()->getParam($this->_objectId),
            'teachings_id' => $this->_teachingsId,
            'major_id' => $this->_majorId
        ]);
    }

    /**
     * Get form save URL
     *
     * @deprecated
     * @see getFormActionUrl()
     * @return string
     */
    public function getSaveUrl()
    {
        $this->setData('form_action_url', 'save');
        return $this->getFormActionUrl();
    }


}
