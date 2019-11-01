<?php

namespace Eightfold\UIKit\Elements;

// use Eightfold\Html\Elements\HtmlElement;

// use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Instance\Text;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

use Eightfold\Html\Elements\Forms\Input;
use Eightfold\Html\Elements\Forms\Label;

abstract class FormControl
{
    protected $label = '';
    protected $name = '';

    protected $value = '';
    protected $valueIsAttr = true;

    protected $placeholder = '';
    protected $describedBy = '';
    protected $requiredAttribute = '';

    protected $hint = '';
    protected $error = '';

    protected $required = true;
    protected $hideLabel = false;

    abstract protected function getFormElement();

    public function __construct(
        string $label,
        string $name,
        $value = '',
        string $placeholder = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function unfold(string ...$attributes): string
    {
        $this->setDescribedBy();

        $this->requiredAttribute = ($this->required)
            ? 'required required'
            : '';

        $container = $this->getContainer();

        $return = Html::$container(
              $this->getLabel($this->label)
            , $this->getHint()
            , $this->getError()
            , $this->getFormElement()
        );

        return $return->unfold();
    }

    public function hint(string $hintText = ''): FormControl
    {
        $this->hint = $hintText;
        return $this;
    }

    public function error(string $errorText = ''): FormControl
    {
        $this->error = $errorText;
        return $this;
    }

    public function optional(): FormControl
    {
        $this->required = false;
        return $this;
    }

    public function hideLabel(): FormControl
    {
        $this->hideLabel = true;
        return $this;
    }

    protected function getContainer(): string
    {
        return 'div';
    }

    protected function getContainerClass(): string
    {
        return (strlen($this->error) > 0)
            ? 'class error'
            : '';
    }

    protected function setDescribedBy()
    {
        $this->describedBy = '';
        if (strlen($this->error) > 0) {
            $this->describedBy = 'aria-describedby '. $this->name .'-error-message';

        } elseif (strlen($this->hint) > 0) {
            $this->describedBy = 'aria-describedby '. $this->name .'-hint-text';

        }
    }

    protected function getLabel($content)
    {
        $label = Html::label($content)->attr('for '. $this->name);
        // $this->setLabelClass($label);
        return $label;
    }

    protected function hasError(): bool
    {
        return (strlen($this->error) > 0);
    }

    protected function setLabelClass(string ...$classes)
    {
        if (count($classes) > 0) {
            $label->attr('class '. implode(' ', $classes));
        }
    }

    private function getHint()
    {
        $hint = '';
        if (strlen($this->hint) > 0) {
            $hint = Html::span($this->hint)
                ->attr('id '. $this->name .'-hint-text', "is ef-form-hint");
        }
        return $hint;
    }

    private function getError()
    {
        $error = '';
        if (strlen($this->error) > 0) {
            $error = Html::span($this->error)
            ->attr('id '. $this->name .'-error-message', "is ef-input-error-message");
        }
        return $error;
    }
}
