<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\UIKit\Elements\FormControl;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

use Eightfold\Html\Elements\Forms\Input;

class InputText extends HtmlElement
{
    private $type = 'text';

    private $pattern = '';

    private $_maxLength = 0;

    private $name = "";

    private $value = "";

    private $placeholder = "";

    public function __construct(
        string $label,
        string $name,
        string $value = '',
        string $placeholder = '')
    {
        $this->label = Component::text($label);
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function password()
    {
        $this->type = "password";
        return $this;
    }

    public function compile(string ...$attributes): string
    {
        return Html::div(
            Html::label($this->label),
            Html::input()->attr(...
                array_merge(
                    [
                        "type ". $this->type,
                        "id ". $this->name,
                        "name ". $this->name,
                        "value ". $this->value,
                        "placeholder ". $this->placeholder
                    ],
                    $this->getAttr()
                )
            )
        )->compile();
    }
}
