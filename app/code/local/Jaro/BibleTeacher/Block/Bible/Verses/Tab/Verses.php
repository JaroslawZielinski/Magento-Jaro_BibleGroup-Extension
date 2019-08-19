<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verses
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verses extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_verses';
        $this->_headerText      = $this->__('All Verses');
        $this->_addButtonLabel  = $this->__('Add Verse');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/verses/new');
    }

}

