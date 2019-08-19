<?php

/**
 * Class Jaro_BibleTeacher_Block_System_Renderer_Index
 */
class Jaro_BibleTeacher_Block_System_Renderer_Index extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $index = $row->getData($this->getColumn()->getIndex());
        return (int)$index + 1;
    }
}
