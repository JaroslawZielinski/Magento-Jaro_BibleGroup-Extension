<?php

require_once 'shell/abstract.php';
require_once 'app/bootstrap.php';

/**
 * Class import_canons
 *
 * install sudo apt-get install php5.6-mysql
 *
 */
class import_canons extends Mage_Shell_Abstract
{
    /**
     *
     */
    const BIBLE_PATH = 'shell' . DIRECTORY_SEPARATOR . 'Bible';

    protected function _construct()
    {
        // Bypass to autoload issue
        Mage::getModel('core/store')->load(0);
        parent::_construct();
    }

    /**
     * @param $file
     * @return int
     */
    protected function _getCountLines($file)
    {
        $fileInput = fopen($file, 'r');
        $result = 0;
        while ($row = fgets($fileInput)) {
            $result++;
        }

        fclose($fileInput);
        return $result;
    }

    /**
     * Fetches all verses in the Bible from the Bible Service
     * from all translations and put it verse by verse to the dbtable
     */
    public
    function run()
    {
        if ($this->getArg('start')) {
            $translations = Mage::getModel('jaro_bibleteacher/translations')->toGridOptionArray();
            $fileCanons = [
                'bible_01.sql',
                'bible_02.sql',
                'bible_03.sql',
                'bible_04.sql',
                'bible_05.sql',
                'bible_06.sql',
                'bible_07.sql',
                'bible_08.sql',
                'bible_09.sql',
                'bible_10.sql',
                'bible_11.sql',
                'bible_12.sql'
            ];
            $canons = array_combine($translations, $fileCanons);
            $startTime = microtime(true);
            $canonCounter = 0;
            $resource = Mage::getSingleton('core/resource');
            $writeConnection = $resource->getConnection('core_write');
            foreach ($canons as $name => $fileCanon) {
                $canonCounter++;
                try {
                    $fileName = self::BIBLE_PATH . DIRECTORY_SEPARATOR . $fileCanon;
                    $count = $this->_getCountLines($fileName);
                    print $name . ' ' . $canonCounter . '/' . count($canons) . PHP_EOL;
                    $progressBar = new \ProgressBar\Manager(0, $count, 124, '#', '_', '#');
                    $c = 0;
                    $fileInput = fopen($fileName, 'r');
                    while ($row = trim(fgets($fileInput))) {
                        $writeConnection->query(sprintf($row, $resource->getTableName('jaro_bibleteacher/bible')));
                        $progressBar->update(++$c);
                    }
                    fclose($fileInput);
                    $seconds = ceil(microtime(true) - $startTime);
                    $hours = floor($seconds / 3600);
                    $mins = floor($seconds / 60 % 60);
                    $secs = floor($seconds % 60);
                    echo PHP_EOL . 'Total Finished in: ' . sprintf('%02d:%02d:%02d', $hours, $mins, $secs) . PHP_EOL . PHP_EOL . PHP_EOL;
                } catch (Exception $exception) {
                    echo $exception->getMessage();
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
    public
    function usageHelp()
    {
        return 'Usage:' . PHP_EOL . 'php import_canons.php start' . PHP_EOL;
    }

}

$shell = new import_canons();
$shell->run();