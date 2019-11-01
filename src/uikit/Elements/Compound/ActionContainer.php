<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\UIKit\UIKit;
use Eightfold\Html\Html;
use Eightfold\Html\Elements\Grouping\Div;

/**
 * Action container
 *
 * Required keys
 *
 * - **form-id:** The id for the form.
 * - **form-action:** The url to go to when the form is submitted.
 * - **left:** A content array to display in the left column of the container.
 * - **right:** A content array to display in the right column of the container.
 *
 * Optional key
 *
 * - **form-method:** get|post (Default is post.)
 */
class ActionContainer extends HtmlElement
{
    private $method = '';
    private $action = '';

    private $left = null;
    private $right = null;

    public function __construct(string $methodAction, Div $left, Div $right)
    {
        list($method, $action) = parent::splitFirstSpace($methodAction);

        $this->method = $method;
        $this->action = $action;

        $this->left = $left;
        $this->right = $right;
    }

    public function compile(string ...$attributes): string
    {
        $attr = array_merge(['method '. $this->method, 'action '. $this->action], $this->getAttr());
        return Html::form(
                  $this->left
                , $this->right
            )->is('ef-action-container')
            ->compile(...$attr);
    }
}
