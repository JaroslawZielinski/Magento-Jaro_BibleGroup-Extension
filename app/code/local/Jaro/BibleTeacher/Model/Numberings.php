<?php

/**
 * Class Jaro_BibleTeacher_Model_Numberings
 *
 * @method string getId()
 * @method string getName()
 * @method string getCode()
 * @method setId($id)
 * @method setName($name)
 * @method setCode($code)
 */
class Jaro_BibleTeacher_Model_Numberings extends Jaro_BibleTeacher_Model_Abstract
{
    /**
     *
     */
    const NUMBERINGS_YES = '/o';

    /**
     *
     */
    const NUMBERINGS_NO = '/';
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/numberings');
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => Mage::helper('jaro_bibleteacher')->__('Yes'), 'value' => self::NUMBERINGS_YES],
            ['label' => Mage::helper('jaro_bibleteacher')->__('No'), 'value' => self::NUMBERINGS_NO]
        ];
    }
}