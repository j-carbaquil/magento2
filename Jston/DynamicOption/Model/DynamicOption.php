<?php

namespace Jston\DynamicOption\Model;

use Magento\Framework\View\Element\BlockFactory;
use Magento\Framework\Stdlib\DateTime;

class DynamicOption
{
    protected $_blockFactory;

    public function __construct(BlockFactory $blockFactory)
    {
        $this->_blockFactory = $blockFactory;
    }

    public function _getDatetimeRenderer(
        $timeFormat = false,
        $isTimeOnly = false
    ) {
        $timeOnly = $isTimeOnly && $timeFormat ? true : false;

        $datetimeRenderer = $this->_blockFactory->createBlock(
            'Jston\DynamicOption\Block\Adminhtml\System\Config\Datetime',
            [
                'data' => [
                    'is_render_to_js_template' => true,
                    'date_format' => DateTime::DATE_INTERNAL_FORMAT,
                    'time_format' => $timeFormat,
                    'time_only' => $timeOnly
                ]
            ]
        );

        return $datetimeRenderer;
    }
}