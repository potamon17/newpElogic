<?php

namespace Andriy\Vendor\Setup;

use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Setup\EavSetupFactory /* For Attribute create  */;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory  $eavSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '0.1.1', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            /** @noinspection DuplicatedCode */
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'vendor_id',/* Custom Attribute Code */
                [
                    'group' => 'Product Details',/* Group name in which you want
                                              to display your custom attribute */
                    'type' => 'int',/* Data type in which formate your value save in database*/
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Vendor', /* lablel of your attribute*/
                    'input' => 'select',
                    'class' => '',
                    'source' => 'Andriy\Vendor\Model\Config\Source\Options',
                    /* Source of your select type custom attribute options*/
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    /*Scope of your attribute */
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false
                ]
            );
        }
        $setup->endSetup();
    }
}
