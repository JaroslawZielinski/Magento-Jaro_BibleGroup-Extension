<?php

/**
 * Class Jaro_BibleTeacher_Adminhtml_MajorController
 */
class Jaro_BibleTeacher_Adminhtml_MajorController extends Mage_Adminhtml_Controller_Action
{
    /**
     *
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_major'));
        $this->renderLayout();
    }

    /**
     *
     */
    public function exportCsvAction()
    {
        $fileName = 'Major_export.csv';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_major_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function exportExcelAction()
    {
        $fileName = 'Major_export.xml';
        $content = $this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_major_grid')->getExcelFile();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     *
     */
    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('ids');
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
        $this->_redirect('*/adminhtml_major/index');
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

        Mage::register('jaro_bibleteacher_major_verses', $model);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('jaro_bibleteacher/bible_verses_tab_major_edit'));
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
        if ($data = $this->getRequest()->getPost()) {

            $id = $this->getRequest()->getParam('id');
            $model = Mage::getModel('jaro_bibleteacher/verses');
            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->_getSession()->addError(
                        Mage::helper('jaro_bibleteacher')->__('This Verses no longer exists.')
                    );
                    $this->_redirect('*/adminhtml_major/index');
                    return;
                }
            }

            // save model
            try {
                $model->addData($data);
                $this->_getSession()->setFormData($data);
                $model->save();
                $this->_getSession()->setFormData(false);
                $this->_getSession()->addSuccess(
                    Mage::helper('jaro_bibleteacher')->__('The Verses has been saved.')
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
                $this->_redirect('*/adminhtml_major/edit', array('id' => $model->getId()));
                return;
            }
        }
        $this->_redirect('*/adminhtml_major/index');
    }

    /**
     *
     */
    public function deleteAction()
    {
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
                $this->_redirect('*/adminhtml_major/index');
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
            $this->_redirect('*/adminhtml_major/edit', array('id' => $id));
            return;
        }
// display error message
        $this->_getSession()->addError(
            Mage::helper('jaro_bibleteacher')->__('Unable to find a Verses to delete.')
        );
// go to grid
        $this->_redirect('*/adminhtml_major/index');
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