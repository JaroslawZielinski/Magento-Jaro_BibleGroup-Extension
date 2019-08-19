<?php

/**
 * Class Jaro_BibleTeacher_CanonsController
 */
class Jaro_BibleTeacher_CanonsController extends Mage_Adminhtml_Controller_Action
{
    /**
     *
     */
    public function indexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('jaro/jaro_bibleteacher_teachings')
            ->_title(Mage::helper('jaro_bibleteacher')->__('Jaro'))->_title(Mage::helper('jaro_bibleteacher')->__('All Canon Verses'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('Jaro'), Mage::helper('jaro_bibleteacher')->__('All Canon Verses'))
            ->_addBreadcrumb(Mage::helper('jaro_bibleteacher')->__('All Canon Verses'), Mage::helper('jaro_bibleteacher')->__('All Canon Verses'));
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_canons'));
        $this->renderLayout();
    }

    /**
     *
     */
    public function exportCsvAction()
    {
        $fileName = 'CanonsVerses_export.csv';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_canons_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function exportExcelAction()
    {
        $fileName = 'CanonsVerses_export.xml';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_canons_grid')->getExcelFile();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('ids');
        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__('Please select Canons Verses(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('jaro_bibleteacher/bible')->load($id);
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
        $this->_redirect('*/canons/index');
    }

    /**
     *
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('jaro_bibleteacher/bible');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('This Canons Verses no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('jaro_bibleteacher_canons', $model);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_canons_edit'));
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
        $redirectBack = $this->getRequest()->getParam('back', false);
        if ($postData = $this->getRequest()->getPost()) {

            $id = $this->getRequest()->getParam('id');
            /** @var Jaro_BibleTeacher_Model_Bible $model */
            $model = Mage::getModel('jaro_bibleteacher/bible');
            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->_getSession()->addError(
                        Mage::helper('jaro_bibleteacher')->__('This Canons Verses no longer exists.')
                    );
                    $this->_redirect('*/canons/index');
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
                ->addFieldToFilter('code', ['eq' => $postData['verse-numbering']])
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
                    Mage::helper('jaro_bibleteacher')->__('The Canons Verses has been saved.')
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $redirectBack = true;
            } catch (Exception $e) {
                $this->_getSession()->addError(Mage::helper('jaro_bibleteacher')->__('Unable to save the Canons Verses.') . $e->getMessage());
                $redirectBack = true;
                Mage::logException($e);
            }

            if ($redirectBack) {
                $this->_redirect('*/canons/new');
                return;
            }
        }
        $this->_redirect('*/canons/index');
    }

    /**
     *
     */
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                // init model and delete
                $model = Mage::getModel('jaro_bibleteacher/bible');
                $model->load($id);
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('jaro_bibleteacher')->__('Unable to find a Canons Verses to delete.'));
                }
                $model->delete();
                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('jaro_bibleteacher')->__('The Canons Verses has been deleted.')
                );
                // go to grid
                $this->_redirect('*/canons/index');
                return;
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('jaro_bibleteacher')->__('An error occurred while deleting Canons Verses data. Please review log and try again.')
                );
                Mage::logException($e);
            }
            // redirect to edit form
            $this->_redirect('*/canons/edit', array('id' => $id));
            return;
        }
// display error message
        $this->_getSession()->addError(
            Mage::helper('jaro_bibleteacher')->__('Unable to find a Canons Verses to delete.')
        );
// go to grid
        $this->_redirect('*/canons/index');
    }

    /**
     * Sprawdź uprawnienia dla użytkownika
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/jaro/jaro_bibleteacher_all_canons');
    }
}