<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\UIKit\UIKit;
use Eightfold\Html\Html;
use Eightfold\Html\Elements\Grouping\Div;

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

    public function compile(): string
    {
        $attr = array_merge(['method '. $this->method, 'action '. $this->action], $this->getAttr());
        return Html::form(
                  $this->left
                , $this->right
            )->is('ef-action-container')
            ->compile(...$attr);
    }
}
