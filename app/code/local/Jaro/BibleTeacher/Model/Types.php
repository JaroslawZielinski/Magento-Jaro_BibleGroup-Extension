<?php

/**
 * Class Jaro_BibleTeacher_Model_Types
 *
 * @method string getId()
 * @method string getName()
 * @method string getCode()
 * @method setId($id)
 * @method setName($name)
 * @method setCode($code)
 */
class Jaro_BibleTeacher_Model_Types extends Jaro_BibleTeacher_Model_Abstract
{
    /**
     *
     */
    const VERSE_TYPES_TEACHING_VERSE = 'teaching_verse';

    /**
     *
     */
    const VERSE_TYPES_MAJOR = 'major';

    /**
     *
     */
    const VERSE_TYPES_MINOR = 'minor';


    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/types');
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => Mage::helper('jaro_bibleteacher')->__('Teaching Verse'), 'value' => self::VERSE_TYPES_TEACHING_VERSE],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Major'), 'value' => self::VERSE_TYPES_MAJOR],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Minor'), 'value' => self::VERSE_TYPES_MINOR]
        ];
    }
}