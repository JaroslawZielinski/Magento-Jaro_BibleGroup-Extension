<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings
    extends Mage_Adminhtml_Block_Widget_Grid_Container
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function __construct()
    {
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_teachings';
        $this->_headerText = Mage::helper('jaro_bibleteacher')->__('Teachings');

        parent::__construct();
    }

    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('jaro_bibleteacher')->__('Teachings');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('jaro_bibleteacher')->__('Teachings');
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
}