<?php
/**
 *
 */
$installer = $this;
$installer->startSetup();

/**
 * Stwórz tabelę 'bibleteacher_bible'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/bible'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'auto_increment' => true,
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'ID')
    ->addColumn('parent_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'nullable' => true,
    ), 'Parent ID')
    ->addColumn('verses_type', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'nullable' => true,
    ), 'Verses Type')
    ->addColumn('translation_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'nullable' => true,
    ), 'Translation ID')
    ->addColumn('numbering_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'nullable' => true,
    ), 'Numbering ID')
    ->addColumn('book', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Book')
    ->addColumn('chapter', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Chapter')
    ->addColumn('start', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Start')
    ->addColumn('stop', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Stop')
    ;
$installer->getConnection()->createTable($table);

$installer->endSetup();