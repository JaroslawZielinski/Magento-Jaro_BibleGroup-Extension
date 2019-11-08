<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Major
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Major extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_major';
        $this->_headerText      = $this->__('Major Verses');
        $this->_addButtonLabel  = $this->__('Add Verse');
        parent::__construct();
        $this->_removeButton('add');
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/adminhtml_major/new');
    }

}

