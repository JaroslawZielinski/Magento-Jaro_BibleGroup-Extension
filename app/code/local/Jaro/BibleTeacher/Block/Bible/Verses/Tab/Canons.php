<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Canons
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Canons extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_canons';
        $this->_headerText      = $this->__('All Canons Verses');
        $this->_addButtonLabel  = $this->__('Add Canons Verse');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/adminhtml_canons/new');
    }

}

