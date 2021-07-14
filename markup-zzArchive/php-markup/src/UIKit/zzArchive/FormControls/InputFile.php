<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\Markup\UIKit\Elements\FormControl;

use Eightfold\Markup\HtmlComponent\Component;
use Eightfold\Markup\Html;

class InputFile extends FormControl
{
    public function __construct(string $label, string $name = '')
    {
        $this->label = $label;
        $this->name = $name;
    }

    protected function getFormElement()
    {
        $name = $this->name;

        $value = $this->value;

        $placeholder = $this->placeholder;

        $describedBy = $this->describedBy;

        $required = $this->requiredAttribute;

        return Html::input()
            ->attr(
                    'id '. $name,
                    'name '. $name,
                    'type file',
                    $value,
                    $placeholder,
                    $describedBy,
                    $required,
                );
    }
}
