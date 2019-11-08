<?php

/**
 * Class Jaro_BibleTeacher_FavouriteController
 */
class Jaro_BibleTeacher_FavouriteController extends Jaro_BibleTeacher_Controller_AbstractController
{
    /**
     *
     */
    public function indexAction()
    {
        $this
            ->_initAction()
            ->renderLayout();
    }
}
