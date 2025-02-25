<?php

$appPath = Mage::getBaseDir('app');
require_once $appPath . DIRECTORY_SEPARATOR . 'bootstrap.php';

/**
 *
 */
class Jaro_BibleTeacher_Helper_Office extends Mage_Core_Helper_Abstract
{
    /**
     * Word 2007
     */
    const PHP_OFFICE_FORMAT_WORD2007 = 'Word2007';

    /**
     * Odt Open Office
     */
    const PHP_OFFICE_FORMAT_ODTEXT = 'ODText';

    /**
     * RTF Rich Text Format
     */
    const PHP_OFFICE_FORMAT_RTF = 'RTF';

    /**
     * HTML format
     */
    const PHP_OFFICE_FORMAT_HTML = 'HTML';

    /**
     * PDF Format
     */
    const PHP_OFFICE_FORMAT_PDF = 'PDF';

    /**
     * Writers
     *
     * @var type
     */
    protected $_writers = [
        self::PHP_OFFICE_FORMAT_WORD2007 => 'docx',
        self::PHP_OFFICE_FORMAT_ODTEXT => 'odt',
        self::PHP_OFFICE_FORMAT_RTF => 'rtf',
        self::PHP_OFFICE_FORMAT_HTML => 'html',
        self::PHP_OFFICE_FORMAT_PDF => 'pdf'
    ];

    /**
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     * @param $filename
     */
    protected function _downloadDOCXFile(\PhpOffice\PhpWord\PhpWord $phpWord, $filename)
    {
        $format = self::PHP_OFFICE_FORMAT_WORD2007;
        $targetFile = "{$filename}.{$this->_writers[$format]}";
        $phpWord->save($targetFile, $format, true);
    }

    /**
     * @param array $content
     */
    public function downloadPHPWordDocument(array $content)
    {
        // Escaping enabled
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

        // New Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // Document Properties
        $properties = $phpWord->getDocInfo();
        $properties->setCreator('Jarosław Zieliński');
        $properties->setCompany('');
        $properties->setTitle('Bible Teachings');
        $properties->setDescription('Bible Teachings using Bible Server');
        $properties->setCategory('religion');
        $properties->setLastModifiedBy('Jaro');
        $properties->setCreated(mktime(12, 0, 0, 24, 12, 2016));
        $properties->setModified(mktime(12, 0, 0, 24, 14, 2016));
        $properties->setSubject('Teachings');
        $properties->setKeywords('Bible, teaching, verses');

        // Default Font Settings
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(12);

        // Default Paragraph Settings
        $phpWord->setDefaultParagraphStyle([
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
            'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.35),
        ]);

        // Title Settings
        $phpWord->addTitleStyle(5, [
            'name' => 'Cambria',
            'size' => 11,
            'bold' => true,
            'smallCaps' => true
        ], [
            'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0),
            'spaceBefore' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.35)
        ]);

        // New portrait section
        $section = $phpWord->addSection();

        // Add header
        $header = $section->addHeader();
        $header->addText($content['name'], [
            'name' => 'Arial',
            'size' => 10,
            'italic' => true
        ]);
        $header->setType();

        // Add footer
        $footer = $section->addFooter();
        $footer->setType();
        $footer->addPreserveText('{PAGE} z {NUMPAGES}', null, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $footer->addLink(
            'http://www.biblia.info.pl/template.php?tpl=index', 
            Mage::helper('jaro_bibleteacher')->__('generated by Jaro'), 
            [
                'name' => 'Arial',
                'size' => 8,
                'color' => 'black'
            ], 
            [
                'spaceAfter' => 0,
                'spaceBefore' => 0,
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
            ]
        );

        // Write Title
        $section->addTitle($content['title'], 5);

        // Write Teaching Verse content
        $section->addText($content['document']['content'], [
            'name' => 'Calibri',
            'size' => 12,
            'bold' => true,
        ]);

        // Write Teaching Verse sigla
        $section->addText($content['document']['sigla'], [
            'name' => 'Calibri',
            'size' => 11,
        ]);

        // Define List numbering Settings
        $multilevelNumberingStyleName = 'multilevel';
        $phpWord->addNumberingStyle($multilevelNumberingStyleName, [
            'type' => 'multilevel',
            'levels' => [
                [
                    'format' => 'decimal',
                    'text' => '(%1)',
                    'left' => 360,
                    'hanging' => 360,
                    'firstLine' => 240,
                    'tabPos' => 360
                ],
                [
                    'format' => 'lowerLetter',
                    'text' => '%2.',
                    'left' => 720,
                    'hanging' => 360,
                    'firstLine' => 240,
                    'tabPos' => 720
                ],
            ],
        ]);

        // Define styles
        $fontStyleNameMajor = [
            'name' => 'Arial',
            'size' => 12
        ];

        // Define styles
        $fontStyleNameMinor = [
            'name' => 'Arial',
            'size' => 12,
            'italic' => true
        ];
        
        $paragraphStyleNameMajor = [
            'indentation' => [
                'firstLine' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(-0.69),
                'left' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1.32),
                'right' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0)
            ]
        ];

        $paragraphStyleNameMinor = [
            'spaceAfter' => 0,
            'indentation' => [
                'firstLine' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(-0.64),
                'left' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2.54),
                'right' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0)
            ]
        ];
        
        $majors = $content['document']['list'];
        
        foreach ($majors as $major) {
            $minors = $major['list'];
            $section->addListItem($major['content'], 0, $fontStyleNameMajor, $multilevelNumberingStyleName, $paragraphStyleNameMajor);
            foreach ($minors as $minor) {
                $section->addListItem($minor['content'], 1, $fontStyleNameMinor, $multilevelNumberingStyleName, $paragraphStyleNameMinor);
                $section->addText("\t\t" . $minor['sigla'], [
                    'bold' => true,
                ], [
                    'tabs' => [
                        new \PhpOffice\PhpWord\Style\Tab('left', 1500),
                    ],
                    'indentation' => [
                        'left' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2.54),
                    ]    
                ]);
            }
        }
        
        // Save file
        $this->_downloadDOCXFile($phpWord, $content['name']);
    }
}
