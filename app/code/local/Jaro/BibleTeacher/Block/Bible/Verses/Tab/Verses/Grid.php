<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verses_Grid
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Verses_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('grid_id');
        // $this->setDefaultSort('COLUMN_ID');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection =
            Mage::getModel('jaro_bibleteacher/verses')
                ->getCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header' => $this->__('ID'),
                'width' => '50px',
                'index' => 'id',
            )
        );

        $this->addColumn('parent_id',
            array(
                'header' => $this->__('Parent ID'),
                'width' => '50px',
                'index' => 'parent_id',
            )
        );

        $this->addColumn('verses_type',
            array(
                'header' => $this->__('Verse Type'),
                'width' => '50px',
                'index' => 'verses_type',
                'type' => 'options',
                'options' => (new Jaro_BibleTeacher_Model_Types)->toGridOptionArray(),
            )
        );

        $this->addColumn('translation_id',
            array(
                'header' => $this->__('Translation'),
                'width' => '50px',
                'index' => 'translation_id',
                'type' => 'options',
                'options' => (new Jaro_BibleTeacher_Model_Translations())->toGridOptionArray(),
            )
        );

        $this->addColumn('numbering_id',
            array(
                'header' => $this->__('Numbering'),
                'width' => '50px',
                'index' => 'numbering_id',
                'type' => 'options',
                'options' => (new Jaro_BibleTeacher_Model_Numberings)->toGridOptionArray(),
            )
        );

        $this->addColumn('book',
            array(
                'header' => $this->__('Book'),
                'width' => '50px',
                'index' => 'book',
                'renderer' => 'Jaro_BibleTeacher_Block_System_Renderer_Book',
                'filter' => false
            )
        );

        $this->addColumn('chapter',
            array(
                'header' => $this->__('Chapter'),
                'width' => '50px',
                'index' => 'chapter',
                'renderer' => 'Jaro_BibleTeacher_Block_System_Renderer_Index',
                'filter' => false
            )
        );

        $this->addColumn('start',
            array(
                'header' => $this->__('Start'),
                'width' => '50px',
                'index' => 'start',
                'renderer' => 'Jaro_BibleTeacher_Block_System_Renderer_Index',
                'filter' => false
            )
        );

        $this->addColumn('stop',
            array(
                'header' => $this->__('Stop'),
                'width' => '50px',
                'index' => 'stop',
                'renderer' => 'Jaro_BibleTeacher_Block_System_Renderer_Index',
                'filter' => false
            )
        );

        $this->addColumn('content',
            array(
                'header' => $this->__('Content'),
                'width' => '300px',
                'index' => 'content',
            )
        );

        $this->addColumn('verses',
            array(
                'header' => $this->__('Minor Verses'),
                'width' => '50px',
                'index' => 'id',
                'renderer' => 'Jaro_BibleTeacher_Block_System_Renderer_Minors',
                'filter' => false
            )
        );

        $this->addExportType('*/*/exportCsv', $this->__('CSV'));

        $this->addExportType('*/*/exportExcel', $this->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/adminhtml_verses/edit', array('id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $modelPk = Mage::getModel('jaro_bibleteacher/verses')->getResource()->getIdFieldName();
        $this->setMassactionIdField($modelPk);
        $this->getMassactionBlock()->setFormFieldName('ids');
        // $this->getMassactionBlock()->setUseSelectAll(false);
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }
}
