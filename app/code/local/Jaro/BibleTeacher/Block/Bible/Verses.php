<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses
 */
class Jaro_BibleTeacher_Block_Bible_Verses extends Mage_Adminhtml_Block_Widget_Form_Container
{

    /**
     * Initialize form
     * Add standard buttons
     * Add "Save and Continue" button
     */
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'promo_quote';

        parent::__construct();

        $this->removeButton('save');
        $this->removeButton('reset');
    }

    /**
     * Getter for form header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('jaro_bibleteacher')->__('Bible');
    }
}
