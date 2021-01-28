<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Andriy\Vendor\Model\Vendor as Vendor;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * delete vendor
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if (!($contact = $this->_objectManager->create(Vendor::class)->load($id))) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', ['_current' => true]);
        }
        try {
            $contact->delete();
            $this->messageManager->addSuccess(__('Your vendor has been deleted !'));
        } catch (Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete vendor: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', ['_current' => true]);
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', ['_current' => true]);
    }
}
