<?php

/**
 * Class Jaro_BibleTeacher_Block_System_VersesQuote
 */
class Jaro_BibleTeacher_Block_System_VersesQuote extends Varien_Data_Form_Element_Abstract
{
    /**
     * Initial values
     * @var array
     */
    protected $_defaultValues = array();

    /**
     * Jaro_BibleTeacher_Block_System_VersesQuote constructor.
     * @param array $attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        if (!empty($verse = $attributes['value'])) {
            $this->_defaultValues['translation'] =
                Mage::getSingleton('jaro_bibleteacher/translations')
                ->load($verse->getTranslationId())
                ->getCode();
            $this->_defaultValues['numbering'] =
                Mage::getSingleton('jaro_bibleteacher/numberings')
                ->load($verse->getNumberingId())
                ->getCode();
            $this->_defaultValues['books'] = $verse->getBook();
            $this->_defaultValues['chapters'] = $verse->getChapter();
            $this->_defaultValues['start'] = $verse->getStart();
            $this->_defaultValues['stop'] = $verse->getStop();
        }
        $this->setType('text');
    }

    /**
     * @param string $idSuffix
     * @return string
     */
    public function getLabelHtml($idSuffix = '')
    {
        if (!is_null($this->getLabel())) {
            $html = '<label for="' . $this->getHtmlId() . $idSuffix . '" style="' . $this->getLabelStyle() . '">' . $this->getLabel()
                . ($this->getRequired() ? ' <span class="required">*</span>' : '') . '</label>' . "\n";
        } else {
            $html = '';
        }
        return $html;
    }

    /**
     * @return string
     */
    public function getElementHtml()
    {
        return Mage::app()
                ->getLayout()
                ->createBlock('jaro_bibleteacher/bible_verses_tab_verse')
                ->setData('value', $this->_defaultValues)
                ->setTemplate('jaro_bibleteacher/verse.phtml')
                ->toHtml();
    }
}