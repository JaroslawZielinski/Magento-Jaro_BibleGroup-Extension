<?php

/**
 *
 */
class Jaro_BibleTeacher_Helper_Content extends Mage_Core_Helper_Abstract
{
    /**
     *
     * @param integer $versesId
     * @return type
     */
    protected function _getLinkedSingleVerses($versesId)
    {
        /** @var Jaro_BibleTeacher_Model_Verses $verses */
        $verses = Mage::getModel('jaro_bibleteacher/verses')->load($versesId);
        $linkedVerses = Mage::getSingleton('jaro_bibleteacher/verses')
            ->getCollection()
            ->addFieldToFilter('parent_id', ['eq' => $verses->getId()]);

        $result = [
            'content' => trim($verses->getContent()),
            'sigla' => Mage::helper('jaro_bibleteacher')->getVersesHelper()->getExtendedSiglaByVerse($verses),
            'list' => null
        ];

        foreach ($linkedVerses as $linkedVerse) {
            $result['list'][] = $this->_getLinkedSingleVerses($linkedVerse->getId());
        }

        return $result;
    }

    /**
     *
     * @param type $id
     * @return type
     */
    public function prepareContent($id)
    {
        /** @var Jaro_BibleTeacher_Model_Teachings $teaching */
        $teaching = Mage::getModel('jaro_bibleteacher/teachings')->load($id);

        $verseId = $teaching->getVerseId();
        $verse = Mage::getModel('jaro_bibleteacher/verses')
            ->load($verseId);

        return [
            'name' => $teaching->getName(),
            'title' => Mage::helper('jaro_bibleteacher')->getVersesHelper()->getShortenedSiglaByVerse($verse),
            'document' => $this->_getLinkedSingleVerses($teaching->getVerseId()),
        ];
    }
}
