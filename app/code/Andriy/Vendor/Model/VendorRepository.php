<?php


namespace Andriy\Vendor\Model;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Andriy\Vendor\Model\ResourceModel\Vendor as ResourceFaq;
use Andriy\Vendor\Model\ResourceModel\Vendor\CollectionFactory as FaqCollectionFactory;

class VendorRepository
{
    protected $resource;




    protected $vendorFactory;


    public function __construct(
        ResourceFaq $resource,

        VendorFactory $vendorFactory
    ) {

        $this->vendorFactory = $vendorFactory;
        $this->resource = $resource;
    }


    public function getById($vendorId)
    {
        $vendor = $this->vendorFactory->create();

        $vendor->getResource()->load($vendor, $vendorId);
        if (!$vendor->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $vendorId));
        }

        return $vendor;
    }
}

