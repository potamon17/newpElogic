<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Andriy\Vendor\Model\VendorRepository;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Andriy\Vendor\Controller\Adminhtml\Index\Vendor
{
    protected $resultPageFactory;

    protected $vendorRepository;


    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        VendorRepository $vendorRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->vendorRepository = $vendorRepository;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     *edit page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if ($postId = (int) $this->getRequest()->getParam('post_id')) {
            try {
                $vendor = $this->vendorRepository->get($postId);

                $resultPage->getConfig()->getTitle()->prepend(__($vendor->getName()));
            } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This Vendor no longer exists.'));

                return $this->_redirect('*/*/index');
            }
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New Vendor'));
        }
        return $resultPage;
    }
}
