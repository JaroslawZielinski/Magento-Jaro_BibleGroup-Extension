<?php

/**
 * Class Jaro_BibleTeacher_Block_System_Renderer_Sigla
 */
class Jaro_BibleTeacher_Block_System_Renderer_Sigla extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $id = $row->getData($this->getColumn()->getIndex());
        $verse = Mage::getSingleton('jaro_bibleteacher/verses')
            ->load($id);

        return '<span style="color:red;">' . Mage::helper('jaro_bibleteacher')->getVersesHelper()->getSiglaByVerse($verse) . '</span>';
    }
}
