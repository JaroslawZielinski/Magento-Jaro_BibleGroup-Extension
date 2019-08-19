<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tabs
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('promo_catalog_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('jaro_bibleteacher')->__('Bible'));
    }
}
