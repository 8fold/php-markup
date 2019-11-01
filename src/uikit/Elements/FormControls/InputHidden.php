<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\Html\Elements\Forms\Input as HtmlInput;

use Eightfold\Html\Html;

class InputHidden
{
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function unfold(): string
    {
        return Html::input()->attr(
              'type hidden'
            , 'name '. $this->name
            , 'value '. $this->value
        )->unfold();
    }
}
