<?php

namespace Eightfold\UIKit\Elements\FormControls;

use Eightfold\Html\Elements\Forms\Input as HtmlInput;

use Eightfold\Html\Html;

/**
 * Hidden Input
 *
 * Used in forms for generally static values not set by the user, but used during
 * post-processing of the form.
 *
 * *Because this a hidden element the `label` key is not required.*
 *
 * Required keys
 *
 * - **name:** The unique identifier for the component within the page.
 * - **value:** The value associated with the component.
 *
 * *Note: To view the example, right- option-click and select inspect element.*
 * @example
 * [
 *     {
 *         "name":"example_1",
 *         "value":"the value"
 *     }
 * ]
 */
class InputHidden extends HtmlInput
{
    public function __construct(string $name, string $value)
    {
        $this->_name = $name;
        $this->_value = $value;

    }

    public function compile(string ...$attributes): string
    {
        return Html::input()->attr(
              'type hidden'
            , 'name '. $this->_name
            , 'value '. $this->_value
        )->compile();
    }
}
