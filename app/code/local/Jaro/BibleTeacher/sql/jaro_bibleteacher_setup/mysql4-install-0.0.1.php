<?php
/**
 *
 */
$installer = $this;
$installer->startSetup();

/**
 * Stwórz tabelę 'bibleteacher_verses'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/verses'))
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

/**
 * Stwórz tabelę 'bibleteacher_verse_teachings'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/teachings'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'auto_increment' => true,
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'ID')
    ->addColumn("created_at", Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        "default" => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ), "Created At")
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Name')
    ->addColumn('verse_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'nullable' => true,
    ), 'Verse ID')
;
$installer->getConnection()->createTable($table);

/**
 * Stwórz tabelę 'bibleteacher_verse_types'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/types'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'auto_increment' => true,
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Name')
    ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Code')
;
$installer->getConnection()->createTable($table);
/**
 * Verses types - init
 */
$options = (new Jaro_BibleTeacher_Model_Types)->toOptionArray();
foreach ($options as $option) {
    Mage::getModel('jaro_bibleteacher/types')
        ->setName($option['label'])
        ->setCode($option['value'])
        ->save();
}
/**
 * Stwórz tabelę 'bibleteacher_verse_translations'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/translations'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'auto_increment' => true,
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => false,
    ), 'Name')
    ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => false,
    ), 'Code')
;
$installer->getConnection()->createTable($table);
/**
 * Verses translations - init
 */
$options = (new Jaro_BibleTeacher_Model_Translations)->toOptionArray();
foreach ($options as $option) {
    Mage::getModel('jaro_bibleteacher/translations')
        ->setName($option['label'])
        ->setCode($option['value'])
        ->save();
}

/**
 * Stwórz tabelę 'bibleteacher_verse_numberings'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('jaro_bibleteacher/numberings'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'auto_increment' => true,
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Name')
    ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable' => true,
    ), 'Code')
;
$installer->getConnection()->createTable($table);
/**
 * Verses numbering - init
 */
$options = (new Jaro_BibleTeacher_Model_Numberings)->toOptionArray();
foreach ($options as $option) {
    Mage::getModel('jaro_bibleteacher/numberings')
        ->setName($option['label'])
        ->setCode($option['value'])
        ->save();
}

$installer->endSetup();