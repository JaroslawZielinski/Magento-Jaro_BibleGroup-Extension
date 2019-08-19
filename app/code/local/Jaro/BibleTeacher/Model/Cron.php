<?php

/**
 * Class Jaro_BibleTeacher_Model_Cron
 */
class Jaro_BibleTeacher_Model_Cron
{
    /**
     * @param $strFileInput
     * @param $strFileOutput
     */
    protected function _fixFileToDisc($strFileInput, $strFileOutput)
    {
        try {
            $fileInput = fopen($strFileInput, 'r');
            $fileOutput = fopen($strFileOutput, 'w');

            while ($row = fgets($fileInput)) {
                // can parse further $row by using str_getcsv
                //$data = str_getcsv($row);
                $oldRows = explode(' ', $row);
                $oldRows[17] = '(';
                $newRow = implode(' ', $oldRows);
                //fputcsv($fileOutput, $data);
                fwrite($fileOutput, $newRow);
            }

            fclose($fileInput);
            fclose($fileOutput);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     *
     */
    public function correctFiles()
    {
        $fileNames = [
            'mysql4-upgrade-0.0.5-0.0.5.1',
            'mysql4-upgrade-0.0.5.1-0.0.5.2',
            'mysql4-upgrade-0.0.5.2-0.0.5.3',
            'mysql4-upgrade-0.0.5.3-0.0.5.4',
            'mysql4-upgrade-0.0.5.4-0.0.5.5',
            'mysql4-upgrade-0.0.5.5-0.0.5.6',
            'mysql4-upgrade-0.0.5.6-0.0.5.7',
            'mysql4-upgrade-0.0.5.7-0.0.5.8',
            'mysql4-upgrade-0.0.5.8-0.0.5.9',
            'mysql4-upgrade-0.0.5.9-0.0.5.10',
            'mysql4-upgrade-0.0.5.10-0.0.5.11',
            'mysql4-upgrade-0.0.5.11-0.0.5.12'
        ];

        set_time_limit(10000);

        foreach ($fileNames as $it => $fileName) {
            var_dump($fileName . '.php');
            $this->_fixFileToDisc($fileName . '.php', $fileName . '.aaa.php');
        }
        die('ok');
    }
}