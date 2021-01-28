<?php

namespace Andriy\Vendor\Model;

use Andriy\Vendor\Model\ResourceModel\Vendor as ResourceFaq;
use Magento\Framework\Exception\NoSuchEntityException;

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

    /** @noinspection PhpMissingReturnTypeInspection */
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
