<?php

/**
 * Class Jaro_BibleTeacher_Block_System_Renderer_Minors
 */
class Jaro_BibleTeacher_Block_System_Renderer_Minors extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    protected $_modelClassName = 'jaro_bibleteacher/verses';
    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $id = $row->getData($this->getColumn()->getIndex());

        $minorVersesType = Mage::getSingleton('jaro_bibleteacher/types')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_MINOR])
            ->getFirstItem()
            ->getId();

        $collection = Mage::getModel($this->_modelClassName)
            ->getCollection()
            ->addFieldToFilter('verses_type', ['eq' => $minorVersesType])
            ->addFieldToFilter('parent_id', ['eq' => $id]);

        $result = '';
        /** @var Jaro_BibleTeacher_Model_Verses $item */
        foreach ($collection as $item) {
            $result .= Mage::helper('jaro_bibleteacher')->getVersesHelper()->getSiglaByVerse($item) . ', ';
        }

        return '<span style="color:black;">' . $result . '</span>';
    }
}
