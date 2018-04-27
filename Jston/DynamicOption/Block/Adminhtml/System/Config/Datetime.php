<?php

namespace Jston\DynamicOption\Block\Adminhtml\System\Config;

use Magento\Framework\View\Element\Html\Date as HtmlDate;

class Datetime extends HtmlDate
{
    protected function _isTimeOnly()
    {
        return $this->getTimeFormat() && $this->getTimeOnly() ? true : false;
    }

    /**
     * Render block HTML
     *
     * @return string
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    protected function _toHtml() {
        $html = '<input type="text" name="' . $this->getInputName() . '" id="' . $this->getInputId() . '" ';
        $html .= 'value="<%- ' . $this->getColumnName() .' %>" ';
        $html .= 'class="' . $this->getClass() . '" ' . $this->getExtraParams() . '/> ';
        $calendarYearsRange = $this->getYearsRange();
        $changeMonth        = $this->getChangeMonth();
        $changeYear         = $this->getChangeYear();
        $maxDate            = $this->getMaxDate();
        $showOn             = $this->getShowOn();

        $html .= '<script type="text/javascript">require(["jquery", "mage/calendar"], function($){ $("#' .
            $this->getInputId() .
            '").calendar({showsTime: ' . ( $this->getTimeFormat() ? 'true' : 'false' ) . ',' .
            'timeOnly: ' . ( $this->_isTimeOnly() ? 'true' : 'false' ) . ',' .
            ( $this->getTimeFormat() ? 'timeFormat: "' . $this->getTimeFormat() . '",' : '' ) .
            'dateFormat: "' . $this->getDateFormat() .
            '",buttonImage: "' . $this->getImage() . '",' .
            ( $calendarYearsRange ? 'yearRange: "' . $calendarYearsRange . '",' : '' ) .
            'buttonText: "' . ( $this->_isTimeOnly() ? 'Select Time' : 'Select Date' ) .
            '"' . ( $maxDate ? ', maxDate: "' . $maxDate . '"' : '' ) .
            ( $changeMonth === null ? '' : ', changeMonth: ' . $changeMonth ) .
            ( $changeYear === null ? '' : ', changeYear: ' . $changeYear ) .
            ( $showOn ? ', showOn: "' . $showOn . '"' : '' ) .
            '})});<\'+\'/script>';

        return $html;
    }
}