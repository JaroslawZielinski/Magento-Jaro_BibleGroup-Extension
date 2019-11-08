<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Grid
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Teachings_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Inicjuje klasę
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('jaro_bibleteacher_bible_verses_tab_teachings_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    /**
     * Zwraca namiar na kolekcję encji events
     *
     * @return string
     */
    protected function _getCollectionClass()
    {
        return 'jaro_bibleteacher/teachings_collection';
    }

    /**
     * Zwraca kolekcję encji teachings
     *
     * @return this
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Stwórz kolumny grida
     *
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header'=>  Mage::helper('jaro_bibleteacher')->__('ID'),
                'index' => 'id',
                'type' => 'text',
                'align' =>'center',
                'width' => '50px'
            )
        );

        $this->addColumn('created_at',
            array(
                'header'=> Mage::helper('jaro_bibleteacher')->__('Created At'),
                'index' => 'created_at',
                'type' => 'datetime',
                'format' => 'yyyy-MM-dd',
                'width' => '130px',
                'align' => 'center'
            )
        );

        $this->addColumn('name',
            array(
                'header'=> Mage::helper('jaro_bibleteacher')->__('Name'),
                'index' => 'name',
                'type' => 'text',
                'width' => '200px'
            )
        );

        $this->addColumn('verse_id',
            array(
                'header'=>  Mage::helper('jaro_bibleteacher')->__('Teaching Verse'),
                'index' => 'verse_id',
                'type' => 'text',
                'align' =>'center',
                'width' => '50px',
                'renderer'  => 'Jaro_BibleTeacher_Block_System_Renderer_Sigla',
                'filter' => false
            )
        );

        $this->addColumn('action',
            array(
                'header'    => Mage::helper('jaro_bibleteacher')->__('Actions'),
                'width'     => '50px',
                'type'      => 'action',
                'getter'     => 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('jaro_bibleteacher')->__('Edit'),
                        'url'     => array('base'=>'*/adminhtml_teachings/edit'),
                        'field'   => 'id'
                    ),
                    array(
                        'caption' => Mage::helper('jaro_bibleteacher')->__('Download'),
                        'url'     => array('base'=>'*/adminhtml_teachings/downloadPHPWordDocument'),
                        'field'   => 'id'
                    ),

                ),
                'filter'    => false,
                'sortable'  => false,
                'is_system' => true
            ));

//        $this->addExportType('*/adminhtml_teachings/exportCsv', Mage::helper('jaro_bibleteacher')->__('CSV'));
//        $this->addExportType('*/adminhtml_teachings/exportExcel', Mage::helper('jaro_bibleteacher')->__('Excel XML'));

        return parent::_prepareColumns();
    }

    /**
     * Zwraca link do wiersza - edycja
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * Tworzy mass akcję zbiorową
     *
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');

        $this->getMassactionBlock()->addItem('remove', array(
            'label'=> Mage::helper('jaro_bibleteacher')->__('Remove'),
            'url'  => $this->getUrl('*/*/massRemove', array('' => '')),
            'confirm' => Mage::helper('jaro_bibleteacher')->__('Are you sure?')
        ));

        return $this;
    }
}