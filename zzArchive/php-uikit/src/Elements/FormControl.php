<?php

namespace Eightfold\UIKit\Elements;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Instance\Text;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

use Eightfold\Html\Elements\Forms\Input;
use Eightfold\Html\Elements\Forms\Label;

abstract class FormControl extends HtmlElement
{
    protected $_label = '';
    protected $_name = '';

    protected $_value = '';
    protected $_valueIsAttr = true;

    protected $_placeholder = '';
    protected $_describedBy = '';
    protected $_requiredAttribute = '';

    protected $_hint = '';
    protected $_error = '';

    protected $_required = true;
    protected $_hideLabel = false;

    abstract protected function getFormElement();

    public function __construct(
        string $label,
        string $name,
        $value = '',
        string $placeholder = '')
    {
        $this->_label = Component::text($label);
        $this->_name = $name;
        $this->_value = $value;
        $this->_placeholder = $placeholder;
    }

    public function compile(string ...$attributes): string
    {
        $this->setDescribedBy();

        $this->_requiredAttribute = ($this->_required)
            ? 'required required'
            : '';

        $container = $this->getContainer();

        $return = Html::$container(
              $this->getLabel($this->_label)
            , $this->getHint()
            , $this->getError()
            , $this->getFormElement()
        )->is('ef-form-control')
        ->attr(...array_merge(
            [$this->getContainerClass()],
            $attributes
        ));

        return $return->compile();
    }

    public function hint(string $hintText = ''): FormControl
    {
        $this->_hint = $hintText;
        return $this;
    }

    public function error(string $errorText = ''): FormControl
    {
        $this->_error = $errorText;
        return $this;
    }

    public function optional(): FormControl
    {
        $this->_required = false;
        return $this;
    }

    public function hideLabel(): FormControl
    {
        $this->_hideLabel = true;
        return $this;
    }

    protected function getContainer(): string
    {
        return 'div';
    }

    protected function getContainerClass(): string
    {
        return (strlen($this->_error) > 0)
            ? 'class error'
            : '';
    }

    protected function setDescribedBy()
    {
        $this->_describedBy = '';
        if (strlen($this->_error) > 0) {
            $this->_describedBy = 'aria-describedby '. $this->_name .'-error-message';

        } elseif (strlen($this->_hint) > 0) {
            $this->_describedBy = 'aria-describedby '. $this->_name .'-hint-text';

        }
    }

    protected function getLabel(Text $content)
    {
        $label = Html::label($content)->attr('for '. $this->_name);
        $this->setLabelClass($label);
        return $label;
    }

    protected function hasError(): bool
    {
        return (strlen($this->_error) > 0);
    }

    protected function setLabelClass($label)
    {
        if (count($classes) > 0) {
            $label->attr('class '. implode(' ', $classes));
        }
    }

    private function getHint()
    {
        $hint = Component::text('');
        if (strlen($this->_hint) > 0) {
            $hint = Html::span(
                    Component::text($this->_hint)
                )->is('ef-form-hint')
                ->attr('id '. $this->_name .'-hint-text');
        }
        return $hint;
    }

    private function getError()
    {
        $error = Component::text('');
        if (strlen($this->_error) > 0) {
            $error = Html::span(
                Component::text($this->_error)
            )->is('ef-input-error-message')
            ->attr('id '. $this->_name .'-error-message');
        }
        return $error;
    }
}
