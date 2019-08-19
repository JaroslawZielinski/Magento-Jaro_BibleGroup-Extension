<?php

/**
 * Class Jaro_BibleTeacher_Model_Mysql4_Types
 */
class Jaro_BibleTeacher_Model_Mysql4_Types extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/types', 'id');
    }
}