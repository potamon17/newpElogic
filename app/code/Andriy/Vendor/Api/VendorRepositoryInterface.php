<?php
namespace Andriy\Vendor\Api;

interface VendorRepositoryInterface
{
    /**
     * @param \Andriy\Vendor\Api\Data\VendorInterface $vendor
     * @return \Andriy\Vendor\Api\Data\VendorInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function save(\Andriy\Vendor\Api\Data\VendorInterface $vendor);

    /**
     * @param int $postId
     * @return \Andriy\Vendor\Api\Data\VendorInterface
     * @throws \Andriy\Vendor\Api\Data\VendorInterface
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function get($postId);

    /**
     * @param \Andriy\Vendor\Api\Data\VendorInterface $vendor
     * @return bool
     * @throws \Andriy\Vendor\Api\Data\VendorInterface
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function delete(\Andriy\Vendor\Api\Data\VendorInterface $vendor);

    /**
     * @param int $postId
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function deleteById($postId);
}
