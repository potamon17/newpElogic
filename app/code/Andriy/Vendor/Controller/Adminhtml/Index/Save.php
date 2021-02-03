<?php /** @noinspection SpellCheckingInspection */

namespace Andriy\Vendor\Controller\Adminhtml\Index;

use Andriy\Vendor\Api\VendorRepositoryInterface;
use Andriy\Vendor\Model\ImageUploader;
use Andriy\Vendor\Model\VendorFactory;
use Andriy\Vendor\Model\VendorRepository;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends Vendor
{
    protected $vendorFactory;
    protected $imageUploader;
    /**
     * @return void
     */
    protected $dataPersistor;
    protected $vendorRepositoryInterface;
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        VendorFactory $vendorFactory,
        ImageUploader $imageUploader,
        VendorRepositoryInterface $vendorRepositoryInterface
    ) {
        $this->vendorRepositoryInterface = $vendorRepositoryInterface;
        $this->imageUploader = $imageUploader;
        $this->dataPersistor = $dataPersistor;
        $this->vendorFactory = $vendorFactory;
        parent::__construct($context);
    }

    /** @noinspection PhpMissingReturnTypeInspection
     * seve new or save edit
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data = $this->getRequest()->getPostValue()) {
            /** @noinspection PhpUndefinedMethodInspection */
            $model = $this->vendorFactory->create();

            $data = $this->_filterVendorData($data);
            $model->setData($data);
            try {
                $this->messageManager->addSuccessMessage(__('You saved the FAQ.'));
                $this->dataPersistor->clear('andriy_vendor_vendor');
                $this->vendorRepositoryInterface->save($model);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['post_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the FAQ.'));
            }

            $this->dataPersistor->set('andriy_vendor_vendor', $data);
            return $resultRedirect->setPath('*/*/edit', ['post_id' => $this->getRequest()->getParam('post_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    protected function _filterVendorData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['image'][0]['name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = null;
        }

        return $data;
    }
}
