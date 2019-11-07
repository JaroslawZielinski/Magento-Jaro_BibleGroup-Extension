<?php

/**
 * Class Jaro_BibleTeacher_TeachingsController
 */
class Jaro_BibleTeacher_TeachingsController extends Mage_Adminhtml_Controller_Action
{
    /**
     *
     */
    public function downloadPHPWordDocumentAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        $content = Mage::helper('jaro_bibleteacher/content')->prepareContent($id);
        Mage::helper('jaro_bibleteacher/office')->downloadPHPWordDocument($content);
    }

    /**
     * grid Teachings
     */
    public function exportCsvAction()
    {
        $fileName = 'Teachings_export.csv';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_teachings_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * grid Teachings
     */
    public function exportExcelAction()
    {
        $fileName = 'Teachings_export.xml';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_teachings_grid')->getExcelFile();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Sprawdź uprawnienia dla użytkownika
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/jaro/jaro_bibleteacher_teachings');
    }

    /**
     * Inicjowanie akcji
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('jaro_bible/jaro_bibleteacher_teachings')
            ->_title(Mage::helper('jaro_bibleteacher')->__('Jaro'))->_title(Mage::helper('jaro_bibleteacher')->__('Teachings'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('Jaro'), Mage::helper('jaro_bibleteacher')->__('Teachings'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('Teachings'), Mage::helper('jaro_bibleteacher')->__('Teachings'));

        return $this;
    }

    /**
     * Akcja index
     */
    public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }

    /**
     * Akcja dodaj nowy Teaching
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Akcja edytuj Teaching
     */
    public function editAction()
    {
        $this->_initAction();

        $id = $this->getRequest()->getParam('id');
        /** @var Jaro_BibleTeacher_Model_Teachings $model */
        $model = Mage::getModel('jaro_bibleteacher/teachings');

        if ($id) {
            $model->load($id);

            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('jaro_bibleteacher')->__('This teaching no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : Mage::helper('jaro_bibleteacher')->__('New Teaching'));

        $data = Mage::getSingleton('adminhtml/session')->getListData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('jaro_bibleteacher_teachings', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? Mage::helper('jaro_bibleteacher')->__('Edit Teaching') : Mage::helper('jaro_bibleteacher')->__('New Teaching'), $id ? Mage::helper('jaro_bibleteacher')->__('Edit Teaching') : Mage::helper('jaro_bibleteacher')->__('New Teaching'))
            ->_addContent($this
                ->getLayout()
                ->createBlock('jaro_bibleteacher/bible_verses_tab_teachings_edit')
                ->setData('action', $this->getUrl('*/teachings/save'))
            )->_addContent($this
                ->getLayout()
                ->createBlock('jaro_bibleteacher/bible_verses_tab_teachings_edit_form')
                ->setData('isEdit', !empty($id))
                ->setTemplate('jaro_bibleteacher/teachings_collapsible.phtml')
            )->_addContent($this
                ->getLayout()
                ->createBlock('jaro_bibleteacher/bible_verses_tab_major')
            )
            ->renderLayout();
    }

    /**
     * Akcja usuń pojedyczy Teaching
     */
    public function removeAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $session = Mage::getSingleton('adminhtml/session');
            $model = Mage::getModel('jaro_bibleteacher/teachings')
                ->load($id);

            if (!$model->getId()) {
                $this->_redirect('*/*/');
                return;
            }

            try {
                $verseId = $model->getVerseId();
                Mage::helper('jaro_bibleteacher')->getVersesHelper()->deleteDeepVersesByTeachingVerse($verseId);
                Mage::getModel('jaro_bibleteacher/verses')->load($verseId)->delete();
                $model->setId($id)->delete();
                $session->addSuccess(Mage::helper('jaro_bibleteacher')->__('The teching has been removed.'));
            } catch (Mage_Core_Exception $e) {
                $session->addError($e->getMessage());
            } catch (Exception $e) {
                $session->addException($e, Mage::helper('jaro_bibleteacher')->__('An error occurred while removing the teaching.'));
            }

            $this->_redirect('*/*/');
            return;
        }
        $this->_redirect('*/*/');
    }

    /**
     * Akcja message
     */
    public function messageAction()
    {
        $data = Mage::getModel('jaro_bibleteacher/teachings')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * Akcja usuń grupowo Teachings
     */
    public function massRemoveAction()
    {
        $teachingsIds = $this->getRequest()->getParam('id');
        if (!is_array($teachingsIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('jaro_bibleteacher')->__('Please select teaching(s).'));
        } else {
            try {
                /** @var Jaro_BibleTeacher_Model_Teachings $teachingModel */
                $teachingModel = Mage::getModel('jaro_bibleteacher/teachings');
                foreach ($teachingsIds as $teachingsId) {
                    $teachingModel->load($teachingsId);
                    $verseId = $teachingModel->getVerseId();
                    Mage::helper('jaro_bibleteacher')->getVersesHelper()->deleteDeepVersesByTeachingVerse($verseId);
                    Mage::getModel('jaro_bibleteacher/verses')->load($verseId)->delete();
                    $teachingModel->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('jaro_bibleteacher')->__(
                        'Total of %d record(s) were deleted.', count($teachingsIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/teachings/index');
    }

    /**
     * Akcja Zapisz Teaching
     */
    public function saveAction()
    {
        $redirectBack = $this->getRequest()->getParam('back', false);
        if ($postData = $this->getRequest()->getPost()) {

            $versesType = Mage::getSingleton('jaro_bibleteacher/types')
                ->getCollection()
                ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Types::VERSE_TYPES_TEACHING_VERSE])
                ->getFirstItem()
                ->getId();

            $translationId = Mage::getSingleton('jaro_bibleteacher/translations')
                ->getCollection()
                ->addFieldToFilter('code', ['eq' => $postData['verse-translations']])
                ->getFirstItem()
                ->getId();

            $numberingId = Mage::getSingleton('jaro_bibleteacher/numberings')
                ->getCollection()
                ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Numberings::NUMBERINGS_YES])
                ->getFirstItem()
                ->getId();

            try {
                $model =
                    Mage::getSingleton('jaro_bibleteacher/teachings')
                        ->load($postData['id']);

                $verse = Mage::getSingleton('jaro_bibleteacher/verses');
                if (!empty($verseId = $model->getVerseId())) {
                    $verse->load($verseId);
                }

                $verse
                    ->setVersesType($versesType)
                    ->setTranslationId($translationId)
                    ->setNumberingId($numberingId)
                    ->setBook($postData['verse-books'])
                    ->setChapter($postData['verse-chapters'])
                    ->setStart($postData['verse-verse-start'])
                    ->setStop($postData['verse-verse-stop']);

                $verse
                    ->setContent(Mage::helper('jaro_bibleteacher')->getVersesHelper()->getVerseByVerse($verse))
                    ->save();

                $model->setData($postData);
                $model->setVerseId($verse->getId());
                $model->save();

                $verse->setParentId(0);
                $verse->save();

                Mage::dispatchEvent('on_teachings_after_save_action', ['id' => $model->getId()]);

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('jaro_bibleteacher')->__('The teaching has been saved.'));

            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $redirectBack = true;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('jaro_bibleteacher')->__('An error occurred while saving this teaching.'));
                $redirectBack = true;
            }

            if ($redirectBack) {
                $this->_redirect('*/teachings/edit', array('id' => $model->getId()));
                return;
            }

            $this->_redirect('*/*/');
            return;
        }
        Mage::getSingleton('adminhtml/session')->setListData($postData);
        $this->_redirectReferer();
    }
}