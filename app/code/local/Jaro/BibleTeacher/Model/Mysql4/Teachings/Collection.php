<?php

/**
 * Class Jaro_BibleTeacher_Model_Mysql4_Teachings_Collection
 */
class Jaro_BibleTeacher_Model_Mysql4_Teachings_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/teachings');
    }

    /**
     * Callback function that filters collection by field "Used" from grid
     *
     * @param Mage_Core_Model_Resource_Db_Collection_Abstract $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     */
    public function addVerseFilterCallback($collection, $column)
    {
        $filterValue = $column->getFilter()->getCondition();

//        $fieldExpression = $this->getConnection()->getCheckSql('main_table.times_used > 0', 1, 0);
//        $resultCondition = $this->_getConditionSql($fieldExpression, array('eq' => $filterValue));
//        $collection->getSelect()->where($resultCondition);
    }
}