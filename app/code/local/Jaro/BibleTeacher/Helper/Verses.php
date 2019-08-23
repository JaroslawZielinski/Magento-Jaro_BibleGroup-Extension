<?php

/**
 * Class Jaro_BibleTeacher_Helper_Verses
 */
class Jaro_BibleTeacher_Helper_Verses extends Mage_Core_Helper_Abstract
{
    /**
     * URL of the Bible Server
     */
    const BIBLE_CGI_URL = 'https://biblia.info.pl/cgi-bin/biblia.cgi?';

    /**
     * REGEXP to fetch verse
     */
    const BIBLE_CGI_REGEXP_MATCH_VALUE = '/<SPAN class="werset[^>]*>(.*?)<BR><BR>/ims';

    /**
     * CHARSET on Page
     */
    const BIBLE_CGI_CHARSET_VALUE = 'UTF-8';

    /**
     * Bible Structure
     * @var array
     */
    protected $_theBibleStructure = [
        '0' => [
            'name' => 'Ks. Rodzaju',
            'sname' => 'gen',
            'struc' => [31, 25, 24, 26, 32, 22, 24, 20, 18, 24, 21, 16, 18, 24, 21, 16, 27, 24, 20, 18, 34, 24, 20, 22, 34, 35, 46, 22, 20, 31, 29, 32, 20, 30, 23, 23, 36, 30, 23, 23, 28, 34, 31, 22, 28, 26]
        ],
        '1' => [
            'name' => 'Ks. Wyjścia',
            'sname' => 'ex',
            'struc' => [22, 25, 22, 31, 23, 30, 29, 28, 35, 29, 10, 51, 22, 31, 27, 36, 16, 27, 25, 26, 37, 30, 33, 18, 40, 37, 21, 43, 46, 38, 7, 35, 23, 35, 35, 38, 29, 31, 43, 38]
        ],
        '2' => [
            'name' => 'Ks. Kapłańska',
            'sname' => 'lev',
            'struc' => [17, 16, 17, 35, 26, 23, 38, 36, 24, 20, 47, 8, 59, 57, 33, 34, 16, 30, 37, 27, 24, 33, 44, 23, 55, 46, 34]
        ],
        '3' => [
            'name' => 'Ks. Liczb',
            'sname' => 'num',
            'struc' => [54, 34, 51, 49, 31, 27, 89, 26, 23, 36, 35, 16, 33, 45, 41, 35, 28, 32, 22, 29, 35, 41, 30, 25, 19, 65, 23, 31, 39, 17, 54, 42, 56, 29, 34, 13]
        ],
        '4' => [
            'name' => 'Ks. Powt.Prawa',
            'sname' => 'deu',
            'struc' => [46, 37, 29, 49, 33, 25, 26, 20, 29, 22, 32, 31, 19, 29, 23, 22, 20, 22, 21, 20, 23, 29, 26, 22, 19, 19, 26, 69, 28, 20, 30, 52, 29, 12]
        ],
        '5' => [
            'name' => 'Ks. Jozuego',
            'sname' => 'jos',
            'struc' => [18, 24, 17, 24, 15, 27, 26, 35, 27, 43, 23, 24, 33, 15, 58, 10, 18, 28, 51, 9, 45, 34, 16, 33]
        ],
        '6' => [
            'name' => 'Ks. Sędziów',
            'sname' => 'jdg',
            'struc' => [36, 23, 31, 24, 31, 40, 25, 35, 57, 18, 40, 15, 15, 20, 20, 31, 13, 31, 30, 48, 25]
        ],
        '7' => [
            'name' => 'Ks. Rut',
            'sname' => 'ru',
            'struc' => [22, 23, 18, 22]
        ],
        '8' => [
            'name' => '1 Ks. Samuela',
            'sname' => '1sa',
            'struc' => [28, 36, 21, 22, 12, 21, 17, 22, 27, 27, 15, 25, 23, 52, 35, 23, 58, 30, 24, 42, 15, 23, 28, 23, 44, 25, 12, 25, 11, 31, 13]
        ],
        '9' => [
            'name' => '2 Ks. Samuela',
            'sname' => '2sa',
            'struc' => [27, 32, 39, 12, 25, 23, 29, 18, 13, 19, 27, 31, 39, 33, 37, 23, 29, 32, 44, 26, 22, 51, 39, 25]
        ],
        '10' => [
            'name' => '1 Ks. Królewska',
            'sname' => '1ki',
            'struc' => [53, 46, 28, 20, 32, 38, 51, 66, 28, 29, 43, 33, 34, 31, 5, 34, 24, 46, 21, 43, 29, 54]
        ],
        '11' => [
            'name' => '2 Ks. Królewska',
            'sname' => '2ki',
            'struc' => [18, 25, 27, 44, 27, 33, 20, 29, 37, 36, 20, 22, 25, 29, 38, 20, 41, 37, 37, 21, 26, 20, 37, 20, 30]
        ],
        '12' => [
            'name' => '1 Ks. Kronik',
            'sname' => '1ch',
            'struc' => [53, 55, 24, 43, 41, 66, 40, 40, 44, 14, 47, 41, 14, 17, 29, 43, 27, 17, 19, 8, 30, 19, 32, 31, 31, 32, 34, 21, 30]
        ],
        '13' => [
            'name' => '2 Ks. Kronik',
            'sname' => '2ch',
            'struc' => [18, 17, 17, 22, 14, 42, 22, 18, 31, 19, 23, 16, 23, 14, 19, 14, 19, 34, 11, 37, 20, 12, 21, 27, 28, 23, 9, 27, 36, 27, 21, 33, 25, 33, 27, 23]
        ],
        '14' => [
            'name' => 'Ks. Ezdrasza',
            'sname' => 'ezr',
            'struc' => [11, 70, 13, 24, 17, 22, 28, 36, 15, 44]
        ],
        '15' => [
            'name' => 'Ks. Nehemiasza',
            'sname' => 'neh',
            'struc' => [11, 20, 38, 17, 19, 19, 72, 18, 37, 40, 36, 47, 31]
        ],
        '16' => [
            'name' => 'Ks. Tobiasza',
            'sname' => 'tob',
            'struc' => [22, 14, 17, 21, 23, 19, 16, 21, 3, 14, 19, 22, 18, 15]
        ],
        '17' => [
            'name' => 'Ks. Judyty',
            'sname' => 'jdt',
            'struc' => [16, 28, 10, 15, 24, 21, 32, 36, 4, 23, 23, 20, 20, 19, 14, 25]
        ],
        '18' => [
            'name' => 'Ks. Estery',
            'sname' => 'est',
            'struc' => [22, 23, 15, 17, 14, 14, 10, 17, 32, 3]
        ],
        '19' => [
            'name' => '1 Ks. Machabejska',
            'sname' => '1mach',
            'struc' => [64, 70, 60, 61, 68, 63, 50, 32, 73, 89, 74, 53, 53, 49, 41, 24]
        ],
        '20' => [
            'name' => '2 Ks. Machabejska',
            'sname' => '2mach',
            'struc' => [36, 32, 40, 50, 27, 31, 42, 36, 29, 38, 38, 45, 26, 46, 39]
        ],
        '21' => [
            'name' => 'Ks. Hioba',
            'sname' => 'hi',
            'struc' => [22, 13, 26, 21, 27, 30, 21, 22, 35, 22, 20, 25, 28, 22, 35, 22, 16, 21, 29, 29, 34, 30, 17, 17, 6, 14, 24, 28, 25, 31, 40, 21, 33, 37, 16, 33, 24, 41, 30, 32, 26, 17]
        ],
        '22' => [
            'name' => 'Ks. Psalmów',
            'sname' => 'ps',
            'struc' => [6, 12, 9, 9, 13, 11, 18, 10, 21, 18, 7, 9, 6, 7, 5, 11, 15, 51, 15, 10, 14, 32, 6, 10, 22, 12, 14, 9, 11, 13, 25, 11, 22, 23, 28, 13, 40, 23, 14, 18, 14, 12, 5, 27, 18, 12, 10, 15, 21, 23, 21, 11, 7, 9, 24, 14, 12, 12, 18, 14, 9, 13, 12, 11, 14, 20, 8, 36, 37, 6, 24, 20, 28, 23, 11, 13, 21, 72, 13, 20, 17, 8, 19, 13, 14, 17, 7, 19, 53, 17, 16, 16, 5, 23, 11, 13, 12, 9, 9, 5, 8, 29, 22, 35, 45, 48, 43, 14, 31, 7, 10, 10, 9, 8, 18, 19, 2, 29, 99, 7, 8, 9, 4, 8, 5, 6, 5, 6, 8, 8, 3, 18, 3, 3, 21, 26, 9, 8, 24, 14, 10, 8, 12, 15, 21, 10, 20, 14, 9, 6]
        ],
        '23' => [
            'name' => 'Ks. Przysłów',
            'sname' => 'pr',
            'struc' => [33, 22, 35, 27, 23, 35, 27, 36, 18, 32, 31, 28, 25, 35, 33, 33, 28, 24, 29, 30, 31, 29, 35, 34, 28, 28, 27, 28, 27, 33, 31]
        ],
        '24' => [
            'name' => 'Ks. Koheleta',
            'sname' => 'ecc',
            'struc' => [18, 26, 22, 17, 19, 12, 29, 17, 18, 20, 10, 14]
        ],
        '25' => [
            'name' => 'Pieśń nad pieśniami',
            'sname' => 'ss',
            'struc' => [17, 17, 11, 16, 16, 12, 14, 14]
        ],
        '26' => [
            'name' => 'Ks. Mądrości',
            'sname' => 'mdr',
            'struc' => [16, 24, 19, 20, 23, 25, 30, 21, 18, 21, 26, 27, 19, 31, 19, 29, 20, 25, 22]
        ],
        '27' => [
            'name' => 'Mądrość Syracha',
            'sname' => 'syr',
            'struc' => [4, 18, 18, 31, 15, 37, 36, 19, 18, 20, 14, 18, 13, 27, 20, 14, 4, 2, 17, 31, 28, 6, 27, 17, 11, 18, 30, 26, 28, 25, 31, 24, 33, 26, 24, 27, 31, 34, 35, 30, 27, 25, 33, 23, 26, 20, 25, 25, 16, 29, 30]
        ],
        '28' => [
            'name' => 'Ks. Izajasza',
            'sname' => 'isa',
            'struc' => [31, 22, 26, 6, 30, 13, 7, 23, 20, 34, 16, 6, 22, 32, 9, 14, 14, 7, 25, 6, 17, 25, 18, 23, 12, 21, 13, 29, 24, 33, 9, 20, 22, 17, 10, 22, 38, 20, 8, 31, 5, 25, 28, 28, 25, 13, 15, 22, 26, 11, 23, 15, 12, 17, 13, 12, 21, 14, 21, 22, 11, 12, 19, 11, 25, 24]
        ],
        '29' => [
            'name' => 'Ks. Jeremiasza',
            'sname' => 'jer',
            'struc' => [19, 37, 25, 31, 13, 30, 34, 23, 25, 25, 23, 17, 27, 22, 21, 21, 27, 23, 15, 18, 14, 30, 40, 10, 38, 24, 22, 17, 32, 24, 40, 44, 26, 22, 19, 32, 21, 27, 18, 16, 18, 22, 13, 30, 5, 28, 7, 47, 39, 46, 64, 34]
        ],
        '30' => [
            'name' => 'Lamentacje Jeremiasza',
            'sname' => 'tr',
            'struc' => [22, 22, 66, 22, 22]
        ],
        '31' => [
            'name' => 'Ks. Barucha',
            'sname' => 'bar',
            'struc' => [22, 35, 38, 37, 9, 44]
        ],
        '32' => [
            'name' => 'Ks. Ezechiela',
            'sname' => 'ez',
            'struc' => [28, 10, 27, 17, 17, 14, 27, 18, 11, 22, 25, 28, 23, 23, 8, 63, 24, 32, 14, 44, 37, 31, 49, 27, 17, 21, 36, 26, 21, 26, 18, 32, 33, 31, 15, 38, 28, 23, 29, 49, 26, 20, 27, 31, 25, 24, 23, 35]
        ],
        '33' => [
            'name' => 'Ks. Daniela',
            'sname' => 'dn',
            'struc' => [21, 49, 99, 34, 30, 29, 28, 27, 27, 19, 45, 13, 64, 42]
        ],
        '34' => [
            'name' => 'Ks. Ozeasza',
            'sname' => 'hos',
            'struc' => [9, 25, 5, 19, 15, 11, 16, 14, 17, 15, 11, 15, 15, 10]
        ],
        '35' => [
            'name' => 'Ks. Joela',
            'sname' => 'joel',
            'struc' => [20, 27, 5, 21]
        ],
        '36' => [
            'name' => 'Ks. Amosa',
            'sname' => 'amos',
            'struc' => [15, 16, 15, 13, 27, 14, 17, 14, 15]
        ],
        '37' => [
            'name' => 'Ks. Abdiasza',
            'sname' => 'ob',
            'struc' => [21]
        ],
        '38' => [
            'name' => 'Ks. Jonasza',
            'sname' => 'jnh',
            'struc' => [16, 11, 10, 11]
        ],
        '39' => [
            'name' => 'Ks. Micheasza',
            'sname' => 'mic',
            'struc' => [16, 13, 12, 14, 14, 16, 20]
        ],
        '40' => [
            'name' => 'Ks. Nahuma',
            'sname' => 'nach',
            'struc' => [14, 14, 19]
        ],
        '41' => [
            'name' => 'Ks. Habakuka',
            'sname' => 'hab',
            'struc' => [17, 20, 19]
        ],
        '42' => [
            'name' => 'Ks. Sofoniasza',
            'sname' => 'zep',
            'struc' => [18, 15, 20]
        ],
        '43' => [
            'name' => 'Ks. Aggeusza',
            'sname' => 'hag',
            'struc' => [6, 23]
        ],
        '44' => [
            'name' => 'Ks. Zachariasza',
            'sname' => 'zec',
            'struc' => [17, 17, 10, 14, 11, 15, 14, 23, 17, 12, 17, 14, 9, 21]
        ],
        '45' => [
            'name' => 'Ks. Malachiasza',
            'sname' => 'mal',
            'struc' => [14, 17, 24]
        ],
        '46' => [
            'name' => 'Ew. Mateusza',
            'sname' => 'mt',
            'struc' => [25, 23, 17, 25, 48, 34, 29, 34, 38, 42, 30, 50, 58, 36, 39, 28, 27, 35, 30, 34, 46, 46, 13, 51, 46, 75, 66, 20]
        ],
        '47' => [
            'name' => 'Ew. Marka',
            'sname' => 'mk',
            'struc' => [45, 28, 35, 41, 43, 56, 37, 38, 43, 52, 25, 44, 37, 72, 47, 20]
        ],
        '48' => [
            'name' => 'Ew. Łukasza',
            'sname' => 'lk',
            'struc' => [80, 52, 38, 44, 39, 49, 50, 56, 62, 42, 54, 59, 35, 35, 32, 31, 37, 43, 48, 47, 38, 71, 56, 53]
        ],
        '49' => [
            'name' => 'Ew. Jana',
            'sname' => 'jn',
            'struc' => [51, 25, 36, 54, 47, 71, 53, 59, 41, 42, 57, 50, 38, 31, 27, 33, 26, 40, 42, 31, 25]
        ],
        '50' => [
            'name' => 'Dzieje Apost.',
            'sname' => 'ac',
            'struc' => [26, 47, 26, 37, 42, 15, 60, 40, 43, 48, 30, 25, 52, 28, 41, 40, 34, 28, 40, 38, 40, 30, 35, 27, 27, 32, 44, 31]
        ],
        '51' => [
            'name' => 'List do Rzymian',
            'sname' => 'ro',
            'struc' => [32, 29, 31, 25, 21, 23, 25, 39, 33, 21, 36, 21, 14, 23, 33, 27]
        ],
        '52' => [
            'name' => '1 list do Koryntian',
            'sname' => '1co',
            'struc' => [31, 16, 23, 21, 13, 20, 40, 13, 27, 33, 34, 31, 13, 40, 58, 24]
        ],
        '53' => [
            'name' => '2 list do Koryntian',
            'sname' => '2co',
            'struc' => [24, 17, 18, 18, 21, 18, 16, 24, 15, 18, 33, 21, 13]
        ],
        '54' => [
            'name' => 'List do Galatów',
            'sname' => 'gal',
            'struc' => [24, 21, 29, 31, 26, 18]
        ],
        '55' => [
            'name' => 'List do Efezjan',
            'sname' => 'eph',
            'struc' => [23, 22, 21, 32, 33, 24]
        ],
        '56' => [
            'name' => 'List do Filipian',
            'sname' => 'php',
            'struc' => [30, 30, 21, 23]
        ],
        '57' => [
            'name' => 'List do Kolosan',
            'sname' => 'col',
            'struc' => [29, 23, 25, 18]
        ],
        '58' => [
            'name' => '1 List do Tesaloniczan',
            'sname' => '1th',
            'struc' => [10, 20, 13, 18, 28]
        ],
        '59' => [
            'name' => '2 List do Tesaloniczan',
            'sname' => '2th',
            'struc' => [12, 17, 18]
        ],
        '60' => [
            'name' => '1 List do Tymoteusza',
            'sname' => '1tm',
            'struc' => [20, 15, 16, 16, 25, 21]
        ],
        '61' => [
            'name' => '2 List do Tymoteusza',
            'sname' => '2tm',
            'struc' => [18, 26, 17, 22]
        ],
        '62' => [
            'name' => 'List do Tytusa',
            'sname' => 'tyt',
            'struc' => [16, 15, 15]
        ],
        '63' => [
            'name' => 'List do Filemona',
            'sname' => 'phm',
            'struc' => [25]
        ],
        '64' => [
            'name' => 'List do Hebrajczyków',
            'sname' => 'hebr',
            'struc' => [14, 18, 19, 16, 14, 20, 28, 13, 28, 39, 40, 29, 25]
        ],
        '65' => [
            'name' => 'List Jakuba',
            'sname' => 'jas',
            'struc' => [27, 26, 18, 17, 20]
        ],
        '66' => [
            'name' => '1 List Piotra',
            'sname' => '1pe',
            'struc' => [25, 25, 22, 19, 14]
        ],
        '67' => [
            'name' => '2 List Piotra',
            'sname' => '2pe',
            'struc' => [21, 22, 18]
        ],
        '68' => [
            'name' => '1 List Jana',
            'sname' => '1jn',
            'struc' => [10, 29, 24, 21, 21]
        ],
        '69' => [
            'name' => '2 List Jana',
            'sname' => '2jn',
            'struc' => [13]
        ],
        '70' => [
            'name' => '3 List Jana',
            'sname' => '3jn',
            'struc' => [15]
        ],
        '71' => [
            'name' => 'List Judy',
            'sname' => 'jude',
            'struc' => [25]
        ],
        '72' => [
            'name' => 'Apokalipsa',
            'sname' => 'rev',
            'struc' => [20, 29, 22, 11, 14, 17, 17, 13, 21, 11, 19, 18, 18, 20, 8, 21, 18, 24, 21, 15, 27, 21]
        ]
    ];

    /**
     * Bible books
     * @var array
     */
    protected $_bibleBooks = [
        'gen' => 'Rdz',
        'ex' => 'Wj',
        'lev' => 'Kpł',
        'num' => 'Lb',
        'deu' => 'Pwt',
        'jos' => 'Joz',
        'jdg' => 'Sdz',
        'ru' => 'Rt',
        '1sa' => '1Sm',
        '2sa' => '2Sm',
        '1ki' => '1Krl',
        '2ki' => '2Krl',
        '1ch' => '1Krn',
        '2ch' => '2Krn',
        'ezr' => 'Ezd',
        'neh' => 'Ne',
        'tob' => 'Tb',
        'jdt' => 'Jdt',
        'est' => 'Est',
        '1mach' => '1Mch',
        '2mach' => '2Mch',
        'hi' => 'Hi',
        'ps' => 'Ps',
        'pr' => 'Prz',
        'ecc' => 'Koh',
        'ss' => 'Pnp',
        'mdr' => 'Mdr',
        'syr' => 'Syr',
        'isa' => 'Iz',
        'jer' => 'Jr',
        'tr' => 'Lm',
        'bar' => 'Ba',
        'ez' => 'Ez',
        'dn' => 'Dn',
        'hos' => 'Oz',
        'joel' => 'Jl',
        'amos' => 'Am',
        'ob' => 'Ab',
        'jnh' => 'Jon',
        'mic' => 'Mi',
        'nach' => 'Na',
        'hab' => 'Ha',
        'zep' => 'So',
        'hag' => 'Ag',
        'zec' => 'Za',
        'mal' => 'Ml',
        'mt' => 'Mt',
        'mk' => 'Mk',
        'lk' => 'Łk',
        'jn' => 'J',
        'ac' => 'Dz',
        'ro' => 'Rz',
        '1co' => '1Kor',
        '2co' => '2Kor',
        'gal' => 'Ga',
        'eph' => 'Ef',
        'php' => 'Flp',
        'col' => 'Kol',
        '1th' => '1Tes',
        '2th' => '2Tes',
        '1tm' => '1Tm',
        '2tm' => '2Tm',
        'tyt' => 'Tt',
        'phm' => 'Flm',
        'hebr' => 'Hbr',
        'jas' => 'Jk',
        '1pe' => '1P',
        '2pe' => '2P',
        '1jn' => '1J',
        '2jn' => '2J',
        '3jn' => '3J',
        'jude' => 'Jud',
        'rev' => 'Ap'
    ];

    /**
     * @var null
     */
    protected $_extendedBibleBooks = null;

    /**
     * @return array
     */
    public function getExtendedBibleBooks()
    {
        if (empty($this->_extendedBibleBooks)) {
            $keys = array_column($this->_theBibleStructure, 'sname');
            $values = array_column($this->_theBibleStructure, 'name');
            $this->_extendedBibleBooks = array_combine($keys, $values);
        }
        return $this->_extendedBibleBooks;
    }

    /**
     * @param array $parts
     * @return string
     */
    public function getVerseURL(array $parts)
    {
        $verseBooks = $parts['verse-books'];
        $verseChapters = (int)$parts['verse-chapters'] + 1;
        $verseVerseStart = (int)$parts['verse-verse-start'] + 1;
        $verseVerseStop = (int)$parts['verse-verse-stop'] + 1;
        $verseNumbering = $parts['verse-numbering'];
        $verseTranslations = $parts['verse-translations'];

        //exceptions: 'ob', 'phm', '2jn', '3jn', 'jude',
        switch ($verseBooks) {
            case 'ob':
            case 'phm':
            case '2jn':
            case '3jn':
            case 'jude':
                $verseChapters = '';
        }

        return
            self::BIBLE_CGI_URL
            . $verseBooks
            . $verseChapters
            . '.'
            . (($verseVerseStart !== $verseVerseStop) ? ($verseVerseStart . '-' . $verseVerseStop) : $verseVerseStart)
            . $verseNumbering
            . $verseTranslations;
    }

    /**
     * @param array $parts
     * @return mixed
     */
    public function getVerse(array $parts)
    {
        $url = $this->getVerseURL($parts);

        $verse = file_get_contents($url);
        $value = preg_match(self::BIBLE_CGI_REGEXP_MATCH_VALUE, $verse, $matches) ? $matches[1] : '';
        $content = iconv(self::BIBLE_CGI_CHARSET_VALUE, "UTF-8", strip_tags($value));
        $content = str_replace([PHP_EOL, '"'], ['', '\''], $content);

        return [
            'url' => $url,
            'content' => trim($content)
        ];
    }

    /**
     * @return array
     */
    public function getBibleStructure()
    {
        return $this->_theBibleStructure;
    }

    /**
     * @param Jaro_BibleTeacher_Model_Verses $verse
     * @return string
     */
    public function getExtendedSiglaByVerse(Jaro_BibleTeacher_Model_Verses $verse)
    {
        $extendedBibleBooks = $this->getExtendedBibleBooks();

        $translationId = $verse->getTranslationId();
        $translationName = Mage::getModel('jaro_bibleteacher/translations')
            ->load($translationId)
            ->getName();

        $start = (int)$verse->getStart() + 1;
        $stop = (int)$verse->getStop() + 1;
        return
            '(' .
            $extendedBibleBooks[$verse->getBook()] .
            ' ' .
            ((int)$verse->getChapter() + 1) .
            ':' .
            (($start !== $stop) ? ($start . '-' . $stop) : ($start)) .
            ', ' .
            $translationName .
            ')'
            ;
    }

    /**
     * @param Jaro_BibleTeacher_Model_Verses $verse
     * @return string
     */
    public function getSiglaByVerse(Jaro_BibleTeacher_Model_Verses $verse)
    {
        $start = (int)$verse->getStart() + 1;
        $stop = (int)$verse->getStop() + 1;
        return
            $this->_bibleBooks[$verse->getBook()] .
            ' ' .
            ((int)$verse->getChapter() + 1) .
            ':' .
            (($start !== $stop) ? ($start . '-' . $stop) : ($start))
        ;
    }

    /**
     * @param Jaro_BibleTeacher_Model_Verses $verse
     * @return string
     */
    public function getShortenedSiglaByVerse(Jaro_BibleTeacher_Model_Verses $verse)
    {
        return
            $this->_bibleBooks[$verse->getBook()] .
            ' ' .
            ((int)$verse->getChapter() + 1)
        ;
    }

    /**
     * @param Jaro_BibleTeacher_Model_Verses $verse
     * @return string
     */
    public function getVerseByVerse(Jaro_BibleTeacher_Model_Verses $verse)
    {
        $result = $this->getVerse([
            'verse-translations' =>
                Mage::getSingleton('jaro_bibleteacher/translations')
                    ->load($verse->getTranslationId())
                    ->getCode(),
            'verse-translations' =>
                Mage::getSingleton('jaro_bibleteacher/numberings')
                    ->load($verse->getNumberingId())
                    ->getCode(),
            'verse-books' => $verse->getBook(),
            'verse-chapters' => $verse->getChapter(),
            'verse-verse-start' => $verse->getStart(),
            'verse-verse-stop' => $verse->getStop()
        ]);
        return $result['content'];
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getBookSigla($code)
    {
        return $this->_bibleBooks[$code];
    }

    /**
     * @param integer $verseId
     * @return bool
     */
    public function deleteDeepVersesByTeachingVerse($verseId)
    {
        //delete old relational verses
        $oldMajorVerses = Mage::getSingleton('jaro_bibleteacher/verses')
            ->getCollection()
            ->addFieldToFilter('parent_id', ['eq' => $verseId]);
        foreach ($oldMajorVerses as $majorVerse) {
            //delete all minor verses
            $oldMinorVerses = Mage::getSingleton('jaro_bibleteacher/verses')
                ->getCollection()
                ->addFieldToFilter('parent_id', ['eq' => $majorVerse->getId()]);
            foreach ($oldMinorVerses as $minorVerse) {
                Mage::getSingleton('jaro_bibleteacher/verses')
                    ->setId($minorVerse->getId())
                    ->delete();
            }
            //delete major verse
            Mage::getSingleton('jaro_bibleteacher/verses')
                ->setId($majorVerse->getId())
                ->delete();
        }

        return true;
    }
}
