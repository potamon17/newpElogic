<?php

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Andriy\Vendor\Model\ResourceModel\Vendor\CollectionFactory;

class MassDelete extends Action
{


    protected $filter;

    protected $collectionFactory;

    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function execute()
    {

        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $categoryDeleted = 0;

            foreach ($collection as $category) {

                $category->delete();
                $categoryDeleted++;
            }

                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', $categoryDeleted)
                );


        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('andriy_vendor/index/index');
    }
}
