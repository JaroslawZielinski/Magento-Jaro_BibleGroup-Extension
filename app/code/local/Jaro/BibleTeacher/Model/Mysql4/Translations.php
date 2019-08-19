<?php

/**
 * Class Jaro_BibleTeacher_Model_Mysql4_Translations
 */
class Jaro_BibleTeacher_Model_Mysql4_Translations extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/translations', 'id');
    }
}