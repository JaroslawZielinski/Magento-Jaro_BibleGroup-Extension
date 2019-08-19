<?php

/**
 * Class Jaro_BibleTeacher_Model_Mysql4_Translations_Collection
 */
class Jaro_BibleTeacher_Model_Mysql4_Translations_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/translations');
    }
}