<?php

/**
 * Class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor
 */
class Jaro_BibleTeacher_Block_Bible_Verses_Tab_Minor extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * @var null
     */
    protected $_teachingsId = null;

    /**
     * @var null
     */
    protected $_majorId = null;
    /**
     * @return mixed
     */
    protected function _getMajorModel()
    {
        return Mage::registry('jaro_bibleteacher_major_verses');
    }

    public function __construct()
    {
        $verse = $this->_getMajorModel();
        $this->_blockGroup = 'jaro_bibleteacher';
        $this->_controller = 'bible_verses_tab_minor';
        $this->_headerText      = $this->__('Minor Verses (' . Mage::helper('jaro_bibleteacher')->getVersesHelper()->getSiglaByVerse($verse) . ')');
        $this->_addButtonLabel  = $this->__('Add Verse');

        $this->_teachingsId = $this->getRequest()->getParam('teachings_id');
        $this->_majorId = $this->getRequest()->getParam('major_id');

        parent::__construct();
        $this->_addButton('back', array(
            'label' => Mage::helper('jaro_bibleteacher')->__('Back'),
            'onclick' => "location.href = '". $this->getUrl('*/teachings/edit', ['id' => $this->_teachingsId]) . "'",
            'class' => 'scalable back',
        ), 0, -10);
    }

    /**
     * @return string
     */
    public function getCreateUrl()
    {
        return $this->getUrl('*/minor/new', [
            'teachings_id' => $this->_teachingsId,
            'major_id' => $this->_majorId
        ]);
    }

}

