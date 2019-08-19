<?php

/**
 * Class Jaro_BibleTeacher_Model_Translations
 *
 * @method string getId()
 * @method string getName()
 * @method string getCode()
 * @method setId($id)
 * @method setName($name)
 * @method setCode($code)
 */
class Jaro_BibleTeacher_Model_Translations extends Jaro_BibleTeacher_Model_Abstract
{
    /**
     * Inicjuje klasę
     */
    protected function _construct()
    {
        $this->_init('jaro_bibleteacher/translations');
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Tysiąclecia'), 'value' => 'tbt'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Warszawska (tzw. Brytyjska)'), 'value' => 'tbw'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Warszawsko-Praska (Romaniuka)'), 'value' => 'tbr'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Gdańska'), 'value' => 'tbg'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Brzeska (NT)'), 'value' => 'tbb'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia Poznańska (NT)'), 'value' => 'tbp'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Biblia w przekładzie Nowego Świata'), 'value' => 'tns'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Łacińska Vulgata'), 'value' => 'tvul'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('King James Version'), 'value' => 'tav'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Webster Bible'), 'value' => 'tweb'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Young\'s Literal Translation'), 'value' => 'tylt'],
            ['label' => Mage::helper('jaro_bibleteacher')->__('Grecka Septuaginta'), 'value' => 'tgr']
        ];
    }
}