<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControl;

use Carbon\Carbon;

use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Instance\Text;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

class InputDate extends FormControl
{
    public function __construct(
        string $label,
        string $name,
        Carbon $value = null,
        Carbon $placeholder = null)
    {
        $this->_label = Component::text($label);
        $this->_name = $name;
        $this->_value = $value;
        $this->_placeholder = $placeholder;
    }

    protected function getContainer(): string
    {
        return 'fieldset';
    }

    protected function getContainerClass(): string
    {
        return ($this->hasError())
            ? 'class fieldset-inputs error'
            : 'class fieldset-inputs';
    }

    protected function getLabel(Text $content)
    {
        $label = Html::legend($content)->attr('for '. $this->_name);
        $this->setLabelClass($label);
        return $label;
    }

    protected function getFormElement(Carbon $date = null)
    {
        $this->setDescribedBy();

        $monthLabel = 'Month';
        $monthName = $this->_name .'-month';
        $monthClass = 'month';
        $monthMin = 1;
        $monthMax = 12;

        $dayLabel = 'Day';
        $dayName = $this->_name .'-day';
        $dayClass = 'day';
        $dayMin = 1;
        $dayMax = 31;

        $yearLabel = 'Year';
        $yearName = $this->_name .'-year';
        $yearClass = 'year';
        $yearMin = 1900;
        $yearMax = Carbon::now()->addYears(1000)->year;

        $inputs = [
            $this->inputField($monthLabel, $monthName, $monthClass, $monthMin,
                $monthMax),
            $this->inputField($dayLabel, $dayName, $dayClass, $dayMin, $dayMax),
            $this->inputField($yearLabel, $yearName, $yearClass, $yearMin, $yearMax)
        ];

        return Html::div(...$inputs)->attr('class ef-date-of-birth');
    }

    private function inputField(
        string $label,
        string $name,
        string $class,
        int $min,
        int $max)
    {
        return UIKit::text_input(
                  $label
                , $name
                , ( ! is_null($this->_value))
                    ? $this->_value->$class
                    : ''
                , ( ! is_null($this->_placeholder))
                    ? $this->_placeholder->$class
                    : ''
            )->attr(
                  'class input-inline'
                , 'type number'
                , 'min '. $min
                , 'max '. $max
                , $this->_describedBy
            );
    }
}
