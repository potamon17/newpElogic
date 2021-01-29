<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Andriy\Vendor\Model\VendorRepository;
use Magento\Backend\App\Action\Context;
use Andriy\Vendor\Model\Vendor as Vendor;
use Magento\Framework\Controller\ResultInterface;

class Delete extends \Andriy\Vendor\Controller\Adminhtml\Index\Vendor
{


    protected $vendorRepository;

    /**
     * Delete constructor.
     * @param Context $context
     * @param VendorRepository $vendorRepository
     */
    public function __construct(
        Context $context,
        VendorRepository $vendorRepository
    ) {
        $this->vendorRepository = $vendorRepository;
        parent::__construct($context);
    }


    /** @noinspection PhpMissingReturnTypeInspection */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('post_id');
        if ($id) {
            try {
                $this->vendorRepository->deleteById($id);
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
