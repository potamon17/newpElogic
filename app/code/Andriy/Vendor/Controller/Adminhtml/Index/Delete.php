<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Andriy\Vendor\Model\Vendor as Vendor;
use Magento\Framework\Controller\ResultInterface;
use Andriy\Vendor\Api\VendorRepositoryInterface;

class Delete extends \Andriy\Vendor\Controller\Adminhtml\Index\Vendor
{


    protected $vendorRepositoryInterface;

    /**
     * Delete constructor.
     * @param Context $context
     * @param VendorRepositoryInterface $vendorRepositoryInterface
     */
    public function __construct(
        Context $context,
        VendorRepositoryInterface $vendorRepositoryInterface
    ) {
        $this->vendorRepositoryInterface = $vendorRepositoryInterface;
        parent::__construct($context);
    }


    /** @noinspection PhpMissingReturnTypeInspection */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('post_id');
        if ($id) {
            try {
                $this->vendorRepositoryInterface->deleteById($id);
                $this->messageManager->addSuccessMessage(__('You deleted the Vendor.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['post_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Vendor to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
