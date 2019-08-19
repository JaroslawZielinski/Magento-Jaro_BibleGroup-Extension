<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verse
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verse
    extends Mage_Adminhtml_Block_Template
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('jaro_bibleteacher')->__('Verse');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('jaro_bibleteacher')->__('Verse');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * @return array
     */
    protected function _getBibleStructure()
    {
        return Mage::helper('jaro_bibleteacher')->getVersesHelper()->getBibleStructure();
    }

    protected function _getUID()
    {
        return '_php_' . uniqid();
    }

    /**
     * @return array
     */
    protected function getTranslations()
    {
        return Mage::getModel('jaro_bibleteacher/translations')->toOptionArray();
    }

    /**
     * @return array
     */
    public function getNumberings()
    {
        return Mage::getModel('jaro_bibleteacher/numberings')->toOptionArray();
    }
}
