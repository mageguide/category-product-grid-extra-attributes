<?php

namespace MageGuide\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab;

use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\Product\Attribute\Source\Status;

class Product extends \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
{

    /**
     * @var \MageGuide\AdminCategoryProductThumbnail\Helper\Data
     */
    protected $mghelper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \MageGuide\AdminCategoryProductThumbnail\Helper\Data $mghelper
     * @param array $data
     * @param Visibility|null $visibility
     * @param Status|null $status
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\Registry $coreRegistry,
        \MageGuide\AdminCategoryProductThumbnail\Helper\Data $mghelper,
        array $data = [],
        Visibility $visibility = null,
        Status $status = null
    ) {
        $this->mghelper = $mghelper;
        parent::__construct($context, $backendHelper, $productFactory, $coreRegistry, $data, $visibility, $status);
    }

    /**
     * Set collection object adding product thumbnail
     *
     * @param \Magento\Framework\Data\Collection $collection
     * @return void
     */
    public function setCollection($collection)
    {
        if ($this->mghelper->getIsActive()) {
            if ($this->mghelper->getIsActiveImage()) {
                $collection->addAttributeToSelect('thumbnail');
            }
            if ($this->mghelper->getIsActiveSpecialPrice()) {
                $collection->addAttributeToSelect('special_price');
            }
            if ($this->mghelper->getIsActiveQty()) {
                $collection->joinField('qty','cataloginventory_stock_item','qty','product_id=entity_id','{{table}}.stock_id=1','left');
            }
        }
        $this->_collection = $collection;
    }

    /**
     * add column image with a custom renderer and after column entity_id
     * @return Extended
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        if ($this->mghelper->getIsActive()) {
            if ($this->mghelper->getIsActiveImage()) {
                $this->addColumnAfter(
                    'image',
                    [
                        'header' => __('Thumbnail'),
                        'index' => 'image',
                        'renderer' => \MageGuide\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer\Image::class,
                        'filter' => false,
                        'sortable' => false,
                        'column_css_class' => 'data-grid-thumbnail-cell'
                    ],
                    'entity_id'
                );
            }
            if ($this->mghelper->getIsActiveQty()) {
                $this->addColumnAfter(
                    'qty',
                    [
                        'header' => __('Quantity'),
                        'index' => 'qty'
                    ],
                    'status'
                );
            }
            if ($this->mghelper->getIsActiveSpecialPrice()) {
                $this->addColumnAfter(
                    'special_price',
                    [
                        'header' => __('Special Price'),
                        'type' => 'currency',
                        'currency_code' => (string)$this->_scopeConfig->getValue(
                            \Magento\Directory\Model\Currency::XML_PATH_CURRENCY_BASE,
                            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                        ),
                        'index' => 'special_price'
                    ],
                    'price'
                );
            }
        }
        $this->sortColumnsByOrder();
        
        return $this;
    }
}
