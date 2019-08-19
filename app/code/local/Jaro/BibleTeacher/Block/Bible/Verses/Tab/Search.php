<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Search
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Search
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
        return Mage::helper('jaro_bibleteacher')->__('Search');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('jaro_bibleteacher')->__('Search');
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

    protected function _getUID()
    {
        return '_php_' . uniqid();
    }
}
