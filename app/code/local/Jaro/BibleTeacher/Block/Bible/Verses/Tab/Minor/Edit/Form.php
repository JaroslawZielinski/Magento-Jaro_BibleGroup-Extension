<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Edit_Form
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @var null
     */
    protected $_teachingsId = null;

    /**
     * @var null
     */
    protected $_majorId = null;
    /**
     * Inicjuj klasę
     */
    public function __construct()
    {
        parent::__construct();

        $this->_teachingsId = $this->getRequest()->getParam('teachings_id');
        $this->_majorId = $this->getRequest()->getParam('major_id');

        $this->setId('jaro_bibleteacher_bible_verses_tab_minor_form');
        $this->setTitle(Mage::helper('jaro_bibleteacher')->__('Minor Verse'));
    }

    protected function _getModel()
    {
        return Mage::registry('jaro_bibleteacher_minor_verses');
    }

    protected function _getHelper()
    {
        return Mage::helper('jaro_bibleteacher');
    }

    protected function _getModelTitle()
    {
        return 'Verses';
    }

    protected function _prepareForm()
    {
        $model = $this->_getModel();
        $modelTitle = $this->_getModelTitle();

        $minorVersesType = Mage::getSingleton('jaro_bibleteacher/types')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_MINOR])
            ->getFirstItem()
            ->getId();

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/minor/save',[
                'teachings_id' => $this->_teachingsId,
                'major_id' => $this->_majorId
            ]),
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

        $fieldset->addField('parent_id', 'hidden', array(
            'name'      => 'parent_id',
            'value' => $this->_majorId
        ));

        $fieldset->addField('verses_type', 'hidden', array(
            'name'      => 'verses_type',
            'value' => $minorVersesType
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
