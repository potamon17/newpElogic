<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Andriy\Vendor\Model\VendorRepository;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Andriy\Vendor\Controller\Adminhtml\Index\Vendor
{
    protected $resultPageFactory;

    protected $faqRepository;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        VendorRepository $faqRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->faqRepository = $faqRepository;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     *edit page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if ($faqGroupId = (int) $this->getRequest()->getParam('post_id')) {
            try {
                $faq = $this->faqRepository->getById($faqGroupId);

                $resultPage->getConfig()->getTitle()->prepend(__($faq->getName()));
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
