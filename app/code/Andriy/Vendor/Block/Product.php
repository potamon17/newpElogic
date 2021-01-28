<?php

namespace Andriy\Vendor\Block;

use Andriy\Vendor\Model\VendorRepository;

class Product extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $_storeManager;

    protected $scopeConfig;
    protected $vendorRepository;
    public function __construct(
        VendorRepository $vendorRepository,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->vendorRepository = $vendorRepository;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
    public function getVendorId()
    {
        return $this->getCurrentProduct()->getVendorId();
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function getVendor()
    {
        $vendorId = $this->getVendorId();
        return $this->vendorRepository->getById($vendorId);
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function getVendorImg()
    {
        $img = $this->getVendor()->getImage();
        return "pub/media/andriy_vendor/tmp/feature/" . $img;
    }
}
