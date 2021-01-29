<?php /** @noinspection PhpHierarchyChecksInspection */

namespace Andriy\Vendor\Model;

use Andriy\Vendor\Model\ResourceModel\Vendor as ResourceVendor;
use Magento\Framework\Exception\NoSuchEntityException;

class VendorRepository
{
    protected $resource;

    protected $vendorFactory;

    public function __construct(
        ResourceVendor $resource,
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

    /** @noinspection PhpMissingReturnTypeInspection */
    public function delete($vendor)
    {
        try {
            $this->resource->delete($vendor);
        } catch (\Exception $exception) {
            /** @noinspection PhpUndefinedClassInspection */
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($vendorId)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        /** @noinspection PhpParamsInspection */
        return $this->delete($this->getById($vendorId));
    }
}
