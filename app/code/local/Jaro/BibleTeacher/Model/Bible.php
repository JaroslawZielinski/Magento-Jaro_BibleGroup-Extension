<?php

/**
 * Class Jaro_BibleTeacher_Model_Bible
 *
 * @method string getParentId()
 * @method string getVersesType()
 * @method string getTranslationId()
 * @method string getNumberingId()
 * @method string getBook()
 * @method string getChapter()
 * @method string getStart()
 * @method string getStop()
 * @method string getContent()
 * @method setParentId($parentId)
 * @method setVersesType($verseType)
 * @method setTranslationId($translationId)
 * @method setNumberingId($numberingId)
 * @method setBook($book)
 * @method setChapter($chapter)
 * @method setStart($start)
 * @method setStop($stop)
 * @method setContent($content)
 */
class Jaro_BibleTeacher_Model_Bible extends Mage_Core_Model_Abstract
{
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/bible');
    }
}