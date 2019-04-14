<?php

namespace JS\OrderView\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const XML_PATH_POPUP_BEHAVIOUR = 'orderview/general/popup_behavior';
    const XML_PATH_ORDER_INFO = 'orderview/general/order_info';
    const XML_PATH_EXTRA_CUSTOMER_INFO = 'orderview/general/extra_customer_info';
    const XML_PATH_ORDER_PAYMENT = 'orderview/general/order_payment';
    const XML_PATH_ORDER_SHIPPING_VIEW = 'orderview/general/order_shipping_view';
    const XML_PATH_ORDER_ITEMS = 'orderview/general/order_items';
    const XML_PATH_ORDER_TOTALS = 'orderview/general/order_totals';
    const XML_PATH_BILLING_ADDRESS = 'orderview/general/billing_address';
    const XML_PATH_SHIPPING_ADDRESS = 'orderview/general/shipping_address';

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function popupBehaviour()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_POPUP_BEHAVIOUR, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showOrderInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ORDER_INFO, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showCustomerInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_EXTRA_CUSTOMER_INFO, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showBillingAddress()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_BILLING_ADDRESS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showShippingAddress()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SHIPPING_ADDRESS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showPaymentInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ORDER_PAYMENT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showShippingInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ORDER_SHIPPING_VIEW, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showItemsInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ORDER_ITEMS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showTotalsInfo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ORDER_TOTALS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}