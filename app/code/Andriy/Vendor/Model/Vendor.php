<?php
namespace Andriy\Vendor\Model;

use Andriy\Vendor\Api\Data\VendorInterface;
use Magento\Framework\Api\CustomAttributesDataInterface;

class Vendor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, \Andriy\Vendor\Api\Data\VendorInterface
{
    const CACHE_TAG = 'andriy_vendor_vendor';
    const VENDOR_ID = 'post_id';

    protected $_cacheTag = 'andriy_vendor_vendor';

    protected $_eventPrefix = 'andriy_vendor_vendor';

    public $vendorFactory;
    protected function _construct(

    ) {
        $this->_init('Andriy\Vendor\Model\ResourceModel\Vendor');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    /**
     * @return array|mixed|null
     */
    public function getVendorId()
    {
        return $this->getData('post_id');
    }

    public function getCustomAttribute($attributeCode)
    {
        // TODO: Implement getCustomAttribute() method.
    }

    public function setCustomAttribute($attributeCode, $attributeValue)
    {
        // TODO: Implement setCustomAttribute() method.
    }

    public function getCustomAttributes()
    {
        // TODO: Implement getCustomAttributes() method.
    }

    public function setCustomAttributes(array $attributes)
    {
        // TODO: Implement setCustomAttributes() method.
    }

    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {

        return $this->setData(self::NAME, $name);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {

        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive($isActive)
    {

        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {

        return $this->setData(self::IMAGE, $image);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {

        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {

        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
