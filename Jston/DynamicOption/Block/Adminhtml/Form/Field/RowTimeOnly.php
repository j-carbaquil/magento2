<?php

namespace Jston\DynamicOption\Block\Adminhtml\Form\Field;

use Jston\DynamicOption\Model\DynamicOption;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Backend\Block\Template\Context;

class RowTimeOnly extends AbstractFieldArray
{
    protected $_dynamicOption;

    public function __construct(
        Context $context,
        DynamicOption $dynamicOption,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->_dynamicOption = $dynamicOption;
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'action_type',
            [
                'label' => __('Action Type'),
                'class' => 'required-entry',
                'size' => '50px'
            ]
        );

        $this->addColumn(
            'action_time',
            [
                'label' => __('Time'),
                'class' => 'required-entry',
                'renderer' => $this->_dynamicOption->_getDatetimeRenderer('HH:mm:ss', true)
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}