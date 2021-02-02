<?php
namespace Andriy\Vendor\Api\Data;

interface VendorInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
    const POST_ID = 'post_id';

    const NAME = 'name';

    const DESCRIPTION = 'description';

    const IS_ACTIVE = 'is_active';

    const IMAGE = 'image';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';
    /**
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getPostId();

    /**
     * @param int $postId
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setPostId($postId);

    /**
     * Returns vendor name
     *
     * @return string
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setName($name);

    /**
     * Returns vendor description
     *
     * @return string|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setDescription($description);

    /**
     * Returns vendor activity flag
     *
     * @return int
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getIsActive();

    /**
     * @param int $isActive
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setIsActive($isActive);

    /**
     * Returns rule condition
     * @since 100.1.0
     */
    public function getImage();

    /**
     * @param $image
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setImage($image);

    /**
     * Returns stop rule processing flag
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getCreatedAt();

    /**
     * @param int $createdAt
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setCreatedAt($createdAt);

    /**
     * Returns rule sort order
     *
     * @return int|null
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getUpdatedAt();

    /**
     * @param int $updatedAt
     * @return $this
     * @since 100.1.0
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setUpdatedAt($updatedAt);

}
