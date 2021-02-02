<?php

namespace Andriy\Vendor\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\ValidatorException;
use Andriy\Vendor\Model\ResourceModel\Vendor as ResourceVendor;
use Andriy\Vendor\Api\Data;
use Andriy\Vendor\Api\VendorRepositoryInterface;

class VendorRepository implements VendorRepositoryInterface
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
    public function get($postId)
    {
        $vendor = $this->vendorFactory->create();


        $vendor->load($postId);
        if (!$vendor->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $postId));
        }

        return $vendor;
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function delete(Data\VendorInterface $vendor)
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
    public function deleteById($postId)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        /** @noinspection PhpParamsInspection */
        return $this->delete($this->get($postId));
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function save(Data\VendorInterface $vendor)
    {

        try {
            /** @noinspection PhpParamsInspection */
            $this->resource->save($vendor);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $vendor;
    }
}
