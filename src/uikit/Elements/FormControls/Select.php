<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControl;

use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Instance\Text;
use Eightfold\Html\Html;


/**
 * Form Select
 *
 * ef_select(['Label text', 'name', ['selected'], 'placeholder'])
 *     ->options(
 *         'label name',
 *         ['label name', 'extra']
 *     )
 *     ->hint('Something')
 *     ->error('Something elese')
 *     ->optional()
 *     ->hideLabel()
 *     ->attr('')
 *
 */
class Select extends FormControl
{
    protected $_type = 'dropdown';

    protected $_options = [];

    public function __construct(
        string $label,
        string $name,
        array $value = [],
        string $placeholder = '')
    {
        parent::__construct($label, $name, $value, $placeholder);
    }

    public function compile(string ...$attributes): string
    {
        return parent::compile(...array_merge($this->getAttr(), $attributes));
    }

    public function options(...$options)
    {
        $this->_options = $options;
        return $this;
    }

    public function checkbox()
    {
        $this->_type = 'checkbox';
        return $this;
    }

    public function radio()
    {
        $this->_type = 'radio';
        return $this;
    }

    protected function getContainer(): string
    {
        if ($this->isDropdown()) {
            return parent::getContainer();
        }
        return 'fieldset';
    }

    protected function getContainerClass(): string
    {
        if ($this->isDropdown()) {
            return parent::getContainerClass();
        }
        return ($this->hasError())
            ? 'class fieldset-inputs error'
            : 'class fieldset-inputs';
    }

    protected function getLabel(Text $content)
    {
        if ($this->isDropdown()) {
            return parent::getLabel($content);
        }
        $label = Html::legend($content);
        $this->setLabelClass($label);
        return $label;
    }

    // protected function labelClass($label)
    // {
    //     if ($this->hasError()) {
    //         return (count($this->_options) == 1)
    //             ? 'class ef-input-error-label ef-sr-only'
    //             : 'class ef-input-error-label';
    //     }
    //     return (count($this->_options) == 1)
    //         ? 'class ef-sr-only'
    //         : '';
    // }

    protected function getFormElement()
    {
        $name = $this->_name;
        $describedBy = $this->_describedBy;

        if ($this->isDropdown()) {
            $options = array_map(function ($option) {
                list($key, $value) = parent::splitFirstSpace($option);

                return Html::option(Component::text($value))->attr(
                    'value '. $key,
                    (is_array($this->_value) && in_array($key, $this->_value))
                        ? 'selected selected'
                        : ''
                );
            }, $this->_options);

            return Html::select(...$options)
                ->attr(
                    'id '. $name,
                    'name '. $name,
                    (strlen($describedBy) > 0)
                        ? 'aria-describedby '. $describedBy
                        : ''
                );
        }

        $options = array_map(function ($option) {
            $span = Component::text('');
            if (is_array($option)) {
                list($control, $extra) = $option;

                $span = Html::span($extra);

                list($key, $value) = parent::splitFirstSpace($control);

            } else {
                list($key, $value) = parent::splitFirstSpace($option);

            }

            $checked =  (is_array($this->_value) && in_array($key, $this->_value))
                ? 'checked checked'
                : '';
            return Html::li(
                  Html::input()->attr(
                      'id '. $key
                    , 'type '. $this->_type
                    , 'name '. $this->_name .'[]'
                    , 'value '. $key
                    , $checked
                  )
                , Html::label(Component::text($value))->attr('for '. $key)
                , $span
            );
        }, $this->_options);
        return Html::ul(...$options)->attr('class ef-unstyled-list');
    }

    private function isDropdown()
    {
        return ($this->_type == 'dropdown');
    }
}
