<?php

/**
 * Class Jaro_BibleTeacher_Model_Teachings
 *
 * @method string getId()
 * @method string getCreatedAt()
 * @method string getName()
 * @method string getVerseId()
 * @method setId($id)
 * @method setCreatedAt($createdAt)
 * @method setName($name)
 * @method setVerseId($verseId)
 */
class Jaro_BibleTeacher_Model_Teachings extends Mage_Core_Model_Abstract
{
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/teachings');
    }
}