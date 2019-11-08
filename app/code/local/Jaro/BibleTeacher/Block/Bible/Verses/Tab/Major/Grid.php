<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Major_Grid
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Major_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('jaro_bibleteacher_bible_verses_tab_major_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
        $this->setFilterVisibility(false);
    }

    protected function _prepareCollection()
    {
        $majorVersesType = Mage::getSingleton('jaro_bibleteacher/types')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_MAJOR])
            ->getFirstItem()
            ->getId();

        $collection =
            Mage::getModel('jaro_bibleteacher/verses')
                ->getCollection()
                ->addFieldToFilter('verses_type', ['eq' => $majorVersesType]);

        /** @var Jaro_BibleTeacher_Model_Teachings $model */
        if (!empty($model = Mage::registry('jaro_bibleteacher_teachings'))) {
            $collection =
                $collection
                    ->addFieldToFilter('parent_id', ['eq' => $model->getVerseId()]);
        }

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

        $this->addColumn('verses',
            array(
                'header' => $this->__('Minor Verses'),
                'width' => '50px',
                'index' => 'id',
                'renderer'  => 'Jaro_BibleTeacher_Block_System_Renderer_Minors',
                'filter' => false
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        /** @var Jaro_BibleTeacher_Model_Teachings $teachings */
        $teachings = Mage::registry('jaro_bibleteacher_teachings');
        return $this->getUrl('*/adminhtml_minor/index', [
            'teachings_id' => $teachings->getId(),
            'major_id' => $row->getId()
        ]);
    }
}
