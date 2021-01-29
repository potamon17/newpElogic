<?php /** @noinspection PhpUndefinedNamespaceInspection */

namespace Andriy\Vendor\Block\Adminhtml\Vendors\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     * @noinspection PhpMissingReturnTypeInspection
     * @noinspection RedundantSuppression
     */
    public function getButtonData()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this contact ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['post_id' => $this->getId()]);
    }
}
