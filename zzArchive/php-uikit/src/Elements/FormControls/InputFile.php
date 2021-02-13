<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControl;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;

/**
 * File Input
 *
 * File inputs allow users to upload files to your site or application.
 *
 * @example
 * [
 *     {
 *         "label":"Upload image",
 *         "name":"file"
 *     }
 * ]
 */
class InputFile extends FormControl
{
    public function __construct(string $label, string $name = '')
    {
        $this->_label = Component::text($label);
        $this->_name = $name;
    }

    protected function getFormElement()
    {
        $name = $this->_name;

        $value = $this->_value;

        $placeholder = $this->_placeholder;

        $describedBy = $this->_describedBy;

        $required = $this->_requiredAttribute;

        return Html::input()
            ->attr(...array_merge(
                [
                    'id '. $name,
                    'name '. $name,
                    'type file',
                    $value,
                    $placeholder,
                    $describedBy,
                    $required,
                ],
                $this->getAttr()
            ));
    }
}
