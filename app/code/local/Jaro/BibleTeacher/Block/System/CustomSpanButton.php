<?php

/**
 * Class Jaro_BibleTeacher_Block_System_CustomSpanButton
 */
class Jaro_BibleTeacher_Block_System_CustomSpanButton extends Varien_Data_Form_Element_Abstract
{
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->setType('button');
    }

    public function getElementHtml()
    {
        $html = '<button class="' . $this->getClass() . '"><span><span><span>' . $this->getEscapedValue() . '</span></span></span></button>';
        $html .= $this->getAfterElementHtml();

        return $html;
    }

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
}