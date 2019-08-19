<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit_Form
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    const FORM_HTML_ID = 'jaro_bibleteacher_teachings_edit_form';
    /**
     *
     */
    protected function _getFormHtmlId()
    {
        return self::FORM_HTML_ID;
    }

    /**
     * @return string
     */
    protected function _getFieldsetHtmlId()
    {
        return 'jaro_bibletacher_teachings_fieldset';
    }

    /**
     * Inicjuj klasę
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('jaro_bibleteacher_bible_verses_tab_teachings_form');
        $this->setTitle(Mage::helper('jaro_bibleteacher')->__('Teaching Information'));
    }

    /**
     * Konfiguruj pola
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     * @throws Exception
     */
    protected function _prepareForm()
    {
        /** @var Jaro_BibleTeacher_Model_Teachings $model */
        $model = Mage::registry('jaro_bibleteacher_teachings');
        if (!empty($verseId = $model->getVerseId())) {
            /** @var Jaro_BibleTeacher_Model_Verses $verse */
            $verse = Mage::getSingleton('jaro_bibleteacher/verses')->load($verseId);
        }

        $form = new Varien_Data_Form(array(
            'id'        => $this->_getFormHtmlId(),
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset($this->_getFieldsetHtmlId(), array(
            'legend'    => Mage::helper('jaro_bibleteacher')->__('Teaching Information'),
            'class'     => 'fieldset-wide',
            'expanded'  => false, // closed
        ));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('created_at', 'date', array(
            'name'               => 'created_at',
            'label'              => Mage::helper('jaro_bibleteacher')->__('Created At'),
            'title'              => Mage::helper('jaro_bibleteacher')->__('Created At'),
            'after_element_html' => '<small>' . Mage::helper('jaro_bibleteacher')->__('Choose') . '</small>',
            'image'              => $this->getSkinUrl('images/grid-cal.gif'),
            'format'             => 'yyyy-MM-dd',
            'value'              => (new DateTime)->format('Y-m-d'),
            'required'  => true,
        ));

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('jaro_bibleteacher')->__('Name'),
            'title'     => Mage::helper('jaro_bibleteacher')->__('Name'),
            'required'  => true,
        ));

        $fieldset->addField('verse_id', 'hidden', array(
            'name' => 'verse_id',
        ));

        $fieldset->addType('verses_button', 'Jaro_BibleTeacher_Block_System_VersesQuote');

        $fieldset->addField('verses', 'verses_button', array(
            'name' => Mage::helper('jaro_bibleteacher')->__('Verses'),
            'label' => Mage::helper('jaro_bibleteacher')->__('Verses'),
            'class' => 'scalable',
            'required' => true,
            'tabindex' => 1,
            'value' => $verse
        ));

        if ($model->getId()) {
            $form->setValues($model->getData());
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}