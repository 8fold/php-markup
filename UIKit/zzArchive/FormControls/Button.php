<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

use Eightfold\UIKit\Traits\ButtonTypes;
/**
 * Form Button
 *
 * Buttons denote action. They are usually tied to a form, but not always.
 *
 * *We call this form button to allow you to access the more generic button element
 * from 8fold Elements.*
 *
 * Required key
 *
 * - **label:** The text to display with the button.
 *
 * Optional keys
 *
 * - **type:** primary|secondary|secondary-inverse|big (Default is primary.) The type
 *   of button to display.
 * - **name:** If you would like to apply a name attribute to the button. This is
 *   helpful if you have a form with multiple buttons. (Must be used with value.)
 * - **value:** See `name`.
 * - **disabled:** true|false (Default is false.) Whether the button should be enabled
 *   or disabled.
 *
 * button(['label', 'name', 'value'])->compile();
 *
 * @example
 *
 *     [
 *         {
 *             "label":"Button"
 *         },
 *         {
 *             "label":"Button",
 *             "type":"secondary"
 *         },
 *         {
 *             "label":"Button",
 *             "disabled":"true"
 *         }
 *     ]
 *
 *
 */
class Button extends HtmlElement
{
    use ButtonTypes;

    protected $label = '';

    private $name = '';
    private $value = '';

    public function __construct(string $label, string $name = '', string $value = '')
    {
        $this->label = Component::text($label);

        if (strlen($name) > 0) {
            $this->name = $name;
            $this->value = $value;
        }
    }

    public function compile(string ...$attributes): string
    {
        $base = Html::button($this->label)->is('ef-button');

        if (strlen($this->name) > 0 && strlen($this->value) > 0) {
            $base->attr('name '. $this->name, 'value '. $this->value);
        }

        return $base->compile(...array_merge($attributes, $this->getAttr()));
    }
}
