<?php

namespace MageGuide\AdminCategoryProductThumbnail\Helper;

/**
 * Helper class
 * @package  MageGuide_AdminCategoryProductThumbnail
 * @module   AdminCategoryProductThumbnail
 * @author   MageGuide Developer
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var array
     */
    protected $_admincategoryproductthumbnailOptions;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
        $this->_admincategoryproductthumbnailOptions = $this->scopeConfig->getValue('mageguide_admincategoryproductthumbnail', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->_admincategoryproductthumbnailOptions['general']['status'];
    }

    /**
     * @return boolean
     */
    public function getIsActiveImage()
    {
        return $this->_admincategoryproductthumbnailOptions['general']['image'];
    }

    /**
     * @return boolean
     */
    public function getIsActiveQty()
    {
        return $this->_admincategoryproductthumbnailOptions['general']['qty'];
    }

    /**
     * @return boolean
     */
    public function getIsActiveSpecialPrice()
    {
        return $this->_admincategoryproductthumbnailOptions['general']['special_price'];
    }

}

?>