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
     */
    public function __construct(
        OptionFactory $optionFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->collection = $collectionFactory->create();
        $this->optionFactory = $optionFactory;
        //you can use this if you want to prepare options dynamically
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $items = $this->collection->getItems();

        foreach ($items as $item) {
            $this->_options[] = [
                'label' => __($item['name']),
                'value' => $item['post_id'],
            ];
        }
        return $this->_options;
    }

    /**
     * Get a text for option value
     *
     * @param string|integer $value
     * @return string|bool
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
