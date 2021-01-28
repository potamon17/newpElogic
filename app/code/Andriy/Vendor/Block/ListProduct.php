<?php

namespace Andriy\Vendor\Block;

use Andriy\Vendor\Model\VendorRepository;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\ProductList\Toolbar;
use Magento\Catalog\Helper\Output as OutputHelper;
use Magento\Catalog\Model\Layer;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;

class ListProduct extends \Magento\Catalog\Block\Product\ListProduct
{
    protected $vendorRepository;

    protected $_defaultToolbarBlock = Toolbar::class;

    /**
     * Product Collection
     *
     * @var AbstractCollection
     */
    protected $_productCollection;

    /**
     * Catalog layer
     *
     * @var Layer
     */
    protected $_catalogLayer;

    /**
     * @var PostHelper
     */
    protected $_postDataHelper;

    /**
     * @var Data
     */
    protected $urlHelper;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @param Context $context
     * @param PostHelper $postDataHelper
     * @param Resolver $layerResolver
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Data $urlHelper
     * @param array $data
     * @param OutputHelper|null $outputHelper
     * @param VendorRepository $vendorRepository
     * @noinspection PhpOptionalBeforeRequiredParametersInspection
     */
    public function __construct(
        Context $context,
        PostHelper $postDataHelper,
        Resolver $layerResolver,
        CategoryRepositoryInterface $categoryRepository,
        Data $urlHelper,
        array $data = [],
        VendorRepository $vendorRepository
    ) {
        $this->_catalogLayer = $layerResolver->get();
        $this->_postDataHelper = $postDataHelper;
        $this->categoryRepository = $categoryRepository;
        $this->urlHelper = $urlHelper;
        $this->vendorRepository = $vendorRepository;

        parent::__construct(
            $context,
            $postDataHelper,
            $layerResolver,
            $categoryRepository,
            $urlHelper,
            $data
        );
    }

//    public function __construct(
//
//        \Magento\Catalog\Block\Product\Context $context,
//        PostHelper $postDataHelper,
//        VendorRepository $vendorRepository,
//
//        array $data = []
//    ) {
//
//        $this->_postDataHelper = $postDataHelper;
//        $this->vendorRepository = $vendorRepository;
//        /** @noinspection PhpParamsInspection */
//        parent::__construct($context, $data);
//    }
    /** @noinspection PhpMissingReturnTypeInspection */
    public function getVendor($vendorId)
    {
        return $this->vendorRepository->getById($vendorId);
    }
}
