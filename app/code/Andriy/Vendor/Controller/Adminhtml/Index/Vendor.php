<?php


namespace Andriy\Vendor\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

abstract class Vendor extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Andriy_Vendor::Vendor';
}
