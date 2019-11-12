<?php

/**
 * Class Jaro_BibleTeacher_Adminhtml_MinorController
 */
class Jaro_BibleTeacher_Adminhtml_MinorController extends Mage_Adminhtml_Controller_Action
{
    /**
     *
     */
    public function indexAction()
    {
        $majorId = $this->getRequest()->getParam('major_id');

        $model = Mage::getModel('jaro_bibleteacher/verses');

        if ($majorId) {
            $model->load($majorId);
            if (!$model->getId()) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('This Verses no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }
        }

        Mage::register('jaro_bibleteacher_major_verses', $model);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_minor'));
        $this->renderLayout();
    }

    /**
     *
     */
    public function exportCsvAction()
    {
        $fileName = 'Minor_export.csv';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_minor_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function exportExcelAction()
    {
        $fileName = 'Minor_export.xml';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_minor_grid')->getExcelFile();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('ids');
        $teachingsId = $this->getRequest()->getParam('teachings_id');
        $majorId = $this->getRequest()->getParam('major_id');

        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__('Please select Verses(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('jaro_bibleteacher/verses')->load($id);
                    $model->delete();
                }

                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) have been deleted.', count($ids))
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('An error occurred while mass deleting items. Please review log and try again.')
                );
                Mage::logException($e);
                return;
            }
        }
        $this->_redirect('*/adminhtml_minor/index', [
            'teachings_id' => $teachingsId,
            'major_id' => $majorId
        ]);
    }

    /**
     *
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('jaro_bibleteacher/verses');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('This Verses no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('jaro_bibleteacher_minor_verses', $model);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_minor_edit'));
        $this->renderLayout();
    }

    /**
     *
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     *
     */
    public function saveAction()
    {
        $teachinsId = $this->getRequest()->getParam('teachings_id');
        $majorId = $this->getRequest()->getParam('major_id');

        $redirectBack = $this->getRequest()->getParam('back', false);
        if ($postData = $this->getRequest()->getPost()) {

            $id = $this->getRequest()->getParam('id');
            /** @var Jaro_BibleTeacher_Model_Verses $model */
            $model = Mage::getModel('jaro_bibleteacher/verses');
            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->_getSession()->addError(
                        Mage::helper('jaro_bibleteacher')->__('This Verses no longer exists.')
                    );
                    $this->_redirect('*/adminhtml_minor/index', [
                        'teachings_id' => $teachinsId,
                        'major_id' => $majorId
                    ]);
                    return;
                }
            }

            $translationId = Mage::getSingleton('jaro_bibleteacher/translations')
                ->getCollection()
                ->addFieldToFilter('code', ['eq' => $postData['verse-translations']])
                ->getFirstItem()
                ->getId();

            $numberingId = Mage::getSingleton('jaro_bibleteacher/numberings')
                ->getCollection()
                ->addFieldToFilter('code', ['eq' => Jaro_BibleTeacher_Model_Numberings::NUMBERINGS_NO])
                ->getFirstItem()
                ->getId();

            // save model
            try {
                $model->addData($postData);
                $this->_getSession()->setFormData($postData);

                $model
                    ->setTranslationId($translationId)
                    ->setNumberingId($numberingId)
                    ->setBook($postData['verse-books'])
                    ->setChapter($postData['verse-chapters'])
                    ->setStart($postData['verse-verse-start'])
                    ->setStop($postData['verse-verse-stop']);

                $model
                    ->setContent(Mage::helper('jaro_bibleteacher')->getVersesHelper()->getVerseByVerse($model))
                    ->save();

                $this->_getSession()->setFormData(false);
                $this->_getSession()->addSuccess(
                    Mage::helper('jaro_bibleteacher')->__('The Verses has been saved (%s).', Mage::helper('jaro_bibleteacher/verses')->getSiglaByVerse($model))
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $redirectBack = true;
            } catch (Exception $e) {
                $this->_getSession()->addError(Mage::helper('jaro_bibleteacher')->__('Unable to save the Verses.'));
                $redirectBack = true;
                Mage::logException($e);
            }

            if ($redirectBack) {
                $this->_redirect('*/adminhtml_minor/new', [
                    'teachings_id' => $teachinsId,
                    'major_id' => $majorId
                ]);
                return;
            }
        }
        $this->_redirect('*/adminhtml_minor/index', [
            'teachings_id' => $teachinsId,
            'major_id' => $majorId
        ]);
    }

    /**
     *
     */
    public function deleteAction()
    {
        $teachingsId = $this->getRequest()->getParam('teachings_id');
        $majorId = $this->getRequest()->getParam('major_id');

        if ($id = $this->getRequest()->getParam('id')) {
            try {
                // init model and delete
                $model = Mage::getModel('jaro_bibleteacher/verses');
                $model->load($id);
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('jaro_bibleteacher')->__('Unable to find a Verses to delete.'));
                }
                $model->delete();
                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('jaro_bibleteacher')->__('The Verses has been deleted.')
                );
                // go to grid
                $this->_redirect('*/adminhtml_minor/index', [
                    'teachings_id' => $teachingsId,
                    'major_id' => $majorId
                ]);
                return;
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('An error occurred while deleting Verses data. Please review log and try again.')
                );
                Mage::logException($e);
            }
            // redirect to edit form
            $this->_redirect('*/adminhtml_minor/edit', [
                'id' => $id,
                'teachings_id' => $teachingsId,
                'major_id' => $majorId
            ]);
            return;
        }
// display error message
        $this->_getSession()->addError(
            Mage::helper('jaro_bibleteacher')->__('Unable to find a Verses to delete.')
        );
// go to grid
        $this->_redirect('*/adminhtml_minor/index', [
            'teachings_id' => $teachingsId,
            'major_id' => $majorId
        ]);
    }

    /**
     * Sprawdź uprawnienia dla użytkownika
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/jaro_bible/jaro_bibleteacher_teachings');
    }
}