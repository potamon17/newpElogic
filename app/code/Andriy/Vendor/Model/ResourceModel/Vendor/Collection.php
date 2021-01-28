<?php
namespace Andriy\Vendor\Model\ResourceModel\Vendor;

use Andriy\Vendor\Model\ResourceModel\Vendor\CollectionFactory;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
//    protected $_eventPrefix = 'andriy_vendor_vendor_collection';
//    protected $_eventObject = 'vendor_collection';

    /**
     * Define resource model
     *
     * @return void
     */




    protected function _construct()
    {

        $this->_init('Andriy\Vendor\Model\Vendor', 'Andriy\Vendor\Model\ResourceModel\Vendor');
        //die(var_dump( $this));

    }


}
