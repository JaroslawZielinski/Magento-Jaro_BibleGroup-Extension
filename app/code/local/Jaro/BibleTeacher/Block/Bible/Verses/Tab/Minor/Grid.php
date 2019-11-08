<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Grid
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * @var null
     */
    protected $_teachingsId = null;

    /**
     * @var null
     */
    protected $_majorId = null;

    public function __construct()
    {
        $this->_teachingsId = $this->getRequest()->getParam('teachings_id');
        $this->_majorId = $this->getRequest()->getParam('major_id');

        parent::__construct();
        $this->setId('jaro_bibleteacher_bible_verses_tab_minor_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
        $this->setFilterVisibility(false);
    }

    protected function _prepareCollection()
    {
        $minorVersesType = Mage::getSingleton('jaro_bibleteacher/types')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_MINOR])
            ->getFirstItem()
            ->getId();

        $collection =
            Mage::getModel('jaro_bibleteacher/verses')
                ->getCollection()
                ->addFieldToFilter('verses_type', ['eq' => $minorVersesType])
                ->addFieldToFilter('parent_id', ['eq' => $this->_majorId]);

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header' => $this->__('Sigla'),
                'width' => '50px',
                'index' => 'id',
                'renderer'  => 'Jaro_BibleTeacher_Block_System_Renderer_Sigla',
                'filter' => false
            )
        );

        $this->addColumn('verse',
            array(
                'header' => $this->__('Verse'),
                'width' => '50px',
                'index' => 'id',
                'renderer'  => 'Jaro_BibleTeacher_Block_System_Renderer_Verse',
                'filter' => false
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/adminhtml_minor/edit', [
            'teachings_id' => $this->_teachingsId,
            'major_id' => $this->_majorId,
            'id' => $row->getId()
        ]);
    }

    protected function _prepareMassaction()
    {
        $modelPk = Mage::getModel('jaro_bibleteacher/verses')->getResource()->getIdFieldName();
        $this->setMassactionIdField($modelPk);
        $this->getMassactionBlock()->setFormFieldName('ids');
        // $this->getMassactionBlock()->setUseSelectAll(false);
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete', [
                'teachings_id' => $this->_teachingsId,
                'major_id' => $this->_majorId,
            ]),
        ));
        return $this;
    }
}
