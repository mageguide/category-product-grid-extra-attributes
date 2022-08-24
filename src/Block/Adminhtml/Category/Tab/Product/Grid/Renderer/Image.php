<?php

namespace MageGuide\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Backend\Block\Context;
use Magento\Catalog\Helper\Image as ImageHelper;

class Image extends AbstractRenderer
{
    /**
     * Image Helper
     *
     * @var ImageHelper
     */
    protected $imageHelper;
    
    /**
     * @param Context $context
     * @param ImageHelper $imageHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }
    /**
     * Renders grid column
     *
     * @param \Magento\Framework\DataObject $row
     * @return  string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $image = 'product_listing_thumbnail';
        $imageUrl = $this->imageHelper->init($row, $image)->getUrl();
        
        return '<img src="'.$imageUrl.'" width="50"/>';
    }
}
