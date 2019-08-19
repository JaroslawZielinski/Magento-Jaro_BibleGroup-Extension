<?php

/**
 * Class Jaro_BibleTeacher_Model_Observer
 */
class Jaro_BibleTeacher_Model_Observer
{
    /**
     * Action after teachings is saved
     *
     * @param $observer
     * @throws Exception
     */
    public function onEventAfterSaveAction($observer)
    {
        $id = $observer
            ->getEvent()
            ->getId();
        
        $verseId = Mage::getSingleton('jaro_bibleteacher/teachings')
            ->load($id)
            ->getVerseId();

        //deep delete verses
        Mage::helper('jaro_bibleteacher')->getVersesHelper()->deleteDeepVersesByTeachingVerse($verseId);

        //save new relational verses
        /** @var Jaro_BibleTeacher_Model_Verses $teachingVerse */
        $teachingVerse = Mage::getSingleton('jaro_bibleteacher/verses')
            ->load($verseId);

        $versesType = Mage::getSingleton('jaro_bibleteacher/types')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_MAJOR])
            ->getFirstItem()
            ->getId();

        $numberingId = Mage::getSingleton('jaro_bibleteacher/numberings')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Numberings::NUMBERINGS_NO])
            ->getFirstItem()
            ->getId();

        for ($i = (int)$teachingVerse->getStart(); $i <= (int)$teachingVerse->getStop(); $i++) {
            /** @var Jaro_BibleTeacher_Model_Verses $verse */
            $verse = Mage::getModel('jaro_bibleteacher/verses')
                ->setParentId($verseId)
                ->setVersesType($versesType)
                ->setTranslationId($teachingVerse->getTranslationId())
                ->setNumberingId($numberingId)
                ->setBook($teachingVerse->getBook())
                ->setChapter($teachingVerse->getChapter())
                ->setStart($i)
                ->setStop($i);
            $verse
                ->setContent(Mage::helper('jaro_bibleteacher')->getVersesHelper()->getVerseByVerse($verse))
                ->save();
        }
    }
}