<?php

namespace Andriy\Vendor\Model\Config\Source;

use Andriy\Vendor\Model\ResourceModel\Vendor\CollectionFactory;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

/**
 * Custom Attribute Renderer
 *
 * @author      Webkul Core Team <support@webkul.com>
 */
class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @var OptionFactory
     */

    public $collection;

    /**
     * @return array|null
     * @noinspection PhpDocSignatureInspection
     */
    public function __construct(
        OptionFactory $optionFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->collection = $collectionFactory->create();
        $this->optionFactory = $optionFactory;
        //you can use this if you want to prepare options dynamically
    }

    /**
     * Get all options
     *
     * @return array
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getAllOptions()
    {
        $items = $this->collection->getItems();

        foreach ($items as $item) {
            if ($item['status'] == 1) {
                $this->_options[] = [
                    'label' => __($item['name']),
                    'value' => $item['post_id'],
                ];
            }
        }
        return $this->_options;
    }

    /**
     * Get a text for option value
     *
     * @param string|integer $value
     * @return string|bool
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }

    /**
     * Retrieve flat column definition
     *
     * @return array
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getFlatColumns()
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        return [
            $attributeCode => [
                'unsigned' => false,
                'default' => null,
                'extra' => null,
                'type' => Table::TYPE_INTEGER,
                'nullable' => true,
                'comment' => 'Custom Attribute Options  ' . $attributeCode . ' column',
            ],
        ];
    }
}
