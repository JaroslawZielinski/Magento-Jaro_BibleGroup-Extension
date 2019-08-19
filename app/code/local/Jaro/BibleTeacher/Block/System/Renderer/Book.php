<?php

/**
 * Class Jaro_BibleTeacher_Block_System_Renderer_Book
 */
class Jaro_BibleTeacher_Block_System_Renderer_Book extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $code = $row->getData($this->getColumn()->getIndex());
        return Mage::helper('jaro_bibleteacher')->getVersesHelper()->getBookSigla($code);
    }
}
