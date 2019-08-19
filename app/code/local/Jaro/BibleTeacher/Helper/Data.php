<?php

/**
 * 
 */
class Jaro_BibleTeacher_Helper_Data extends Mage_Core_Helper_Abstract 
{
    /**
     * 
     */
    public function getVersesHelper()
    {
        if (Mage::getStoreConfigFlag('bible/settings/cgi_offline')) {
            return Mage::helper('jaro_bibleteacher/versesOffline');
        } else {
            return Mage::helper('jaro_bibleteacher/verses');
        }
    }
}
