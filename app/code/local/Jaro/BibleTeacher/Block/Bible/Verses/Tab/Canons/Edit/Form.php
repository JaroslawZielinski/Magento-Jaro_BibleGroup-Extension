<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Canons_Edit_Form
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Canons_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Inicjuj klasę
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('jaro_bibleteacher_bible_verses_tab_canons_form');
        $this->setTitle(Mage::helper('jaro_bibleteacher')->__('All Verse'));
    }

    protected function _getModel()
    {
        return Mage::registry('jaro_bibleteacher_canons');
    }

    protected function _getHelper()
    {
        return Mage::helper('jaro_bibleteacher');
    }

    protected function _getModelTitle()
    {
        return 'Canons Verses';
    }

    protected function _prepareForm()
    {
        $model = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/adminhtml_canons/save'),
            'method' => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => $this->_getHelper()->__("$modelTitle Information"),
            'class' => 'fieldset-wide',
        ));

        if ($model && $model->getId()) {
            $modelPk = $model->getResource()->getIdFieldName();
            $fieldset->addField($modelPk, 'hidden', array(
                'name' => $modelPk,
            ));
        }

        $fieldset->addField('parent_id', 'text', array(
            'name'      => 'parent_id',
            'label'     => Mage::helper('jaro_bibleteacher')->__('Parent ID'),
            'title'     => Mage::helper('jaro_bibleteacher')->__('Parent ID'),
            'required'  => true,
        ));

        $fieldset->addField('verses_type', 'select', array(
            'label'     => Mage::helper('jaro_bibleteacher')->__('Verse Type'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'verses_type',
            'values' => (new Jaro_BibleTeacher_Model_Types)->toGridOptionArray()
        ));

        $fieldset->addType('verses_button', 'Jaro_BibleTeacher_Block_System_VersesQuote');

        $fieldset->addField('verses', 'verses_button', array(
            'name' => Mage::helper('jaro_bibleteacher')->__('Verses'),
            'label' => Mage::helper('jaro_bibleteacher')->__('Verses'),
            'class' => 'scalable',
            'required' => true,
            'tabindex' => 1,
            'value' => $model->getId() ? $model : null
        ));

        if ($model->getId()) {
            $form->setValues($model->getData());
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
