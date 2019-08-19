<?php

/**
 * Class Jaro_BibleTeacher_Helper_VersesOffline
 */
class Jaro_BibleTeacher_Helper_VersesOffline extends Jaro_BibleTeacher_Helper_Verses
{
    /**
     * @param array $parts
     * @return mixed
     */
    public function getVerse(array $parts)
    {
        $url = $this->getVerseURL($parts);
        //translation
        $translationId = Mage::getSingleton('jaro_bibleteacher/translations')
            ->getCollection()
            ->addFieldToFilter('code', ['eq' => $parts['verse-translations']])
            ->getFirstItem()
            ->getId();
        //sql
        $adapter = Mage::getSingleton('core/resource')->getConnection('read');
        $start = intval($parts['verse-verse-start']);
        $select = $adapter->select()
            ->from(['o' => Mage::getSingleton('core/resource')->getTableName('jaro_bibleteacher/bible')])
            ->where('o.translation_id = ?', $translationId)
            ->where('o.book = ?', $parts['verse-books'])
            ->where('o.chapter = ?', intval($parts['verse-chapters']))
            ->where('o.start >= ?', $start)
            ->where('o.start <= ?', intval($parts['verse-verse-stop']));
        $result = $adapter->fetchAll($select);
        //select content
        $verses = array_column($result, 'content');
        //format depending on numbering
        if ($parts['verse-numbering'] == Jaro_BibleTeacher_Model_Numberings::NUMBERINGS_YES) {
            $content = '';
            foreach ($verses as $it => $verse) {
                $content .= ' (' . ($it + $start + 1) . ') ' . $verse;
            }
        } elseif ($parts['verse-numbering'] == Jaro_BibleTeacher_Model_Numberings::NUMBERINGS_NO) {
            $content = implode(' ', $verses);
        }
        //return result
        return [
            'url' => $url,
            'content' => trim($content)
        ];
    }
}
