<?php
namespace Andriy\Vendor\Ui\DataProvider\Vendor\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{

      protected function _initSelect()
      {
          $this->addFilterToMap('post_id', 'andriy_vendor.post_id');

          parent::_initSelect();

      }
}
