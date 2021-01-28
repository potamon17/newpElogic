<?php
namespace Andriy\Vendor\Model\ResourceModel;


class Vendor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('andriy_vendor', 'post_id');
        //die(var_dump($this->_init('andriy_vendor', 'post_id')));
    }

}
