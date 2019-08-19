<?php

require_once 'abstract.php';
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'ProgressBar' . DIRECTORY_SEPARATOR . 'Manager.php';
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'ProgressBar' . DIRECTORY_SEPARATOR . 'Registry.php';

/**
 * Class fetch_all_verses_all_translations
 *
 * install sudo apt-get install php5.6-mysql
 *
 */
class fetch_all_verses_all_translations extends Mage_Shell_Abstract
{
    protected function _construct()
    {
        // Bypass to autoload issue
        Mage::getModel('core/store')->load(0);
        parent::_construct();
    }

    /**
     * Fetches all verses in the Bible from the Bible Service 
     * from all translations and put it verse by verse to the dbtable
     */
    public function run()
    {
        if ($this->getArg('start')) {
            $startTime = microtime(true);
            
            $translations = Mage::getModel('jaro_bibleteacher/translations')->toGridOptionArray();
            $countTranslations = count($translations);
            
            $versesService = Mage::helper('jaro_bibleteacher/verses');
            $bible = $versesService->getBibleStructure();
            
            foreach ($translations as $translationId => $translation) {
                $translationCode = Mage::getSingleton('jaro_bibleteacher/translations')
                                        ->load($translationId)
                                        ->getCode();
                $prefix = $translationId . '/' . $countTranslations . ' ';
                foreach ($bible as $it => $book) {
                    print $prefix . $translation . ' : ' . $book['name'] . PHP_EOL;
                    $bookStruc = $book['struc'];
                    $allVerses = 0;
                    foreach($bookStruc as $verse) {
                        $allVerses += (int)$verse;
                    }
                    $progressBar = new \ProgressBar\Manager(0, $allVerses, 124, '#', '_', '#');
                    $c = 0;
                    foreach($bookStruc as $chapter => $lastVerse) {
                        for($verse = 0 ; $verse < (int)$lastVerse; $verse++) {
                            $result = $versesService->getVerse([
                                'verse-books' => $book['sname'],
                                'verse-chapters' => $chapter,
                                'verse-verse-start' => $verse,
                                'verse-verse-stop' => $verse,
                                'verse-numbering' =>'/',
                                'verse-translations' => $translationCode
                            ]);
                            if (!empty($content = trim($result['content']))) {
                                //write verse to table Bible
                                Mage::getModel('jaro_bibleteacher/bible')
                                    ->setParentId(0)
                                    ->setVersesType(2)
                                    ->setTranslationId($translationId)
                                    ->setNumberingId(2)
                                    ->setBook($book['sname'])
                                    ->setChapter($chapter)
                                    ->setStart($verse)
                                    ->setStop($verse)
                                    ->setContent($content)
                                    ->save();
                            }
                            //update progress bar
                            $progressBar->update(++$c);
                        }
                    }
                    $seconds = ceil(microtime(true) - $startTime);
                    $hours = floor($seconds / 3600);
                    $mins = floor($seconds / 60 % 60);
                    $secs = floor($seconds % 60);

                    echo PHP_EOL . 'Total Finished in: ' . sprintf('%02d:%02d:%02d', $hours, $mins, $secs) . PHP_EOL . PHP_EOL . PHP_EOL;
                }
            }
            echo 'Finished :D by Jaro' . PHP_EOL . PHP_EOL;    
        } else {
            echo $this->usageHelp();
        }
    }

    /**
     * Retrieve Usage Help Message
     */
    public function usageHelp()
    {
        return 'Usage:' . PHP_EOL . 'php fetch_all_verses_all_translations.php start' . PHP_EOL;
    }

}

$shell = new fetch_all_verses_all_translations();
$shell->run();