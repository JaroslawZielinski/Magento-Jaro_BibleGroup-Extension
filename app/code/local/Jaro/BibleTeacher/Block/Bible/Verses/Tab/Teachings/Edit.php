<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Inicjuj klasę
     */
    public function __construct()
    {
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_teachings';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('jaro_bibleteacher')->__('Save Teaching'));
        $this->_updateButton('delete', 'label', Mage::helper('jaro_bibleteacher')->__('Delete Teaching'));
        $this->removeButton('save');
        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('jaro_bibleteacher')->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            editForm = new varienForm('" . Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit_Form::FORM_HTML_ID . "', '');
            function saveAndContinueEdit(){
                var confirmStatus = confirm('" . Mage::helper('jaro_bibleteacher')->__('Whole verses with references will be lost. Are you sure?') . "');
                if (confirmStatus) {
                    editForm.submit($('". Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit_Form::FORM_HTML_ID . "').action+'back/edit/');
                }
            }
        ";
    }

    /**
     * Pobierz tekst nagłówka
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('jaro_bibleteacher_teachings')->getId()) {
            return Mage::helper('jaro_bibleteacher')->__('Edit Teaching');
        }
        else {
            return Mage::helper('jaro_bibleteacher')->__('New Teaching');
        }
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/teachings/remove', [$this->_objectId => $this->getRequest()->getParam($this->_objectId)]);
    }
}