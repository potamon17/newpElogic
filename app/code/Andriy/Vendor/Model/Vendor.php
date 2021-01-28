<?php
namespace Andriy\Vendor\Model;

class Vendor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
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

}
