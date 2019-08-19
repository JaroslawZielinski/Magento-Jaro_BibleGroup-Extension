<?php

/**
 * Class Jaro_BibleTeacher_Model_Abstract
 */
class Jaro_BibleTeacher_Model_Abstract extends Mage_Core_Model_Abstract
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => Mage::helper('jaro_bibleteacher')->__('Option1'), 'value' => '1'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Option2'), 'value' => '2']
        ];
    }

    /**
     * @return array
     */
    public function toGridOptionArray()
    {
        $options = $this->toOptionArray();
        $values = array_column($options, 'label');

        $codes = array_column($options, 'value');
        $ids = [];
        foreach ($codes as $code) {
            $ids[] =
                $this
                    ->getCollection()
                    ->addFieldToFilter('code', ['eq' => $code])
                    ->getFirstItem()
                    ->getId();
        }

        return array_combine($ids, $values);
    }
}