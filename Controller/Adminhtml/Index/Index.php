<?php

namespace JS\OrderView\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Json\Helper\Data;
use Magento\Framework\Registry;
use Magento\Framework\View\LayoutFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Sales\Api\OrderRepositoryInterface;

class Index extends Action
{

    protected $resultPageFactory;
    protected $jsonHelper;

    /**
     * Constructor
     *
     * @param Context  $context
     * @param Data $jsonHelper
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Data $jsonHelper,
        OrderRepositoryInterface $orderRepository,
        LayoutFactory $layoutFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        $this->orderRepository = $orderRepository;
        $this->_coreRegistry = $registry;
        $this->layoutFactory = $layoutFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $orderId = $this->getRequest()->getParam('order_id');
            if ($orderId) {
                $order = $this->orderRepository->get($orderId);
                if (!$order->getId()) {
                    $this->messageManager->addError(__('This Order no longer exits. '));
                }
            }
            $this->_coreRegistry->register('current_order', $order);
            return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage());
        }
    }

    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }
}
