<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControl;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;

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
