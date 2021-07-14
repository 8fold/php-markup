<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControl;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;

/**
 * Text area
 *
 * The text area component allows users to input long-form text content.
 *
 * @example
 * [
 *     {
 *         "label":"Long text",
 *         "name":"long_text",
 *         "content":"Hello, World!"
 *     }
 * ]
 */
class Textarea extends FormControl
{
    protected $_valueIsAttr = false;

    public function __construct(
        string $label,
        string $name,
        string $value = '',
        string $placeholder = '')
    {
        $this->_label = Component::text($label);
        $this->_name = $name;
        $this->_value = $value;
        $this->_placeholder = $placeholder;
    }

    protected function getFormElement()
    {
        $content = $this->_content[0];

        $name = $this->_name;

        $value = $this->_value;

        $placeholder = $this->_placeholder;

        $describedBy = $this->_describedBy;

        $required = $this->_requiredAttribute;

        return Html::textarea(Component::text($value))
            ->attr(...array_merge(
                [
                    'id '. $name,
                    'name '. $name,
                    'placeholder '. $placeholder,
                    $describedBy,
                    $required,
                ],
                $this->getAttr()
            ));
    }
}
