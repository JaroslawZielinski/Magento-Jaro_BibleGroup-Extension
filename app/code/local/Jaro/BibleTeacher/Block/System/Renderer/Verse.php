<?php

/**
 * Class Jaro_BibleTeacher_Block_System_Renderer_Verse
 */
class Jaro_BibleTeacher_Block_System_Renderer_Verse extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $id = $row->getData($this->getColumn()->getIndex());
        /** @var Jaro_BibleTeacher_Model_Verses $verse */
        $verse = Mage::getSingleton('jaro_bibleteacher/verses')
            ->load($id);

        return '<span style="color:forestgreen;">' . $verse->getContent() . '</span>';
    }
}
