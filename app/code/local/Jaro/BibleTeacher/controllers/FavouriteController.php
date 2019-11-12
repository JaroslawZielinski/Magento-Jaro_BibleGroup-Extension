<?php

/**
 * Class Jaro_BibleTeacher_FavouriteController
 */
class Jaro_BibleTeacher_FavouriteController extends Jaro_BibleTeacher_Controller_AbstractController
{

    const RANDOM_VERSES = [
        ['Mt', 7, 21, 27],
        ['J', 14, 21, 24],
        ['1J', 2, 4, 4],
        ['1J', 3, 2, 4],
        ['Ez', 36, 24, 27],
        ['Ap', 14, 6, 12],
    ];

    /**
     *
     */
    public function indexAction()
    {
        $this
            ->_initAction();

        $maxLength = count(self::RANDOM_VERSES);
        $which = rand(0, $maxLength - 1);

        /** @var Varien_Object $verse */
        $verse = new Varien_object(Mage::helper('jaro_bibleteacher/verses')->getVerse([
                'verse-translations' => 'tbw',
                'verse-numbering' => '/o',
                'verse-books' => self::RANDOM_VERSES[$which][0],
                'verse-chapters' => (int)self::RANDOM_VERSES[$which][1] - 1,
                'verse-verse-start' => (int)self::RANDOM_VERSES[$which][2] - 1,
                'verse-verse-stop' => (int)self::RANDOM_VERSES[$which][3] - 1
        ]));

        $this
            ->getLayout()
            ->getBlock('jaro_bibleteacher_content')
            ->setData([
                'title' => sprintf('%s %s, %s - %s', self::RANDOM_VERSES[$which][0], self::RANDOM_VERSES[$which][1], self::RANDOM_VERSES[$which][2], self::RANDOM_VERSES[$which][3]),
                'content' => $verse->getContent(),
                'link' => $verse->getUrl(),
                'link_label' => 'Learn more »'
            ]);

        $this
            ->renderLayout();
    }
}
