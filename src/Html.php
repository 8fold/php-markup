<?php

namespace Eightfold\Markup;

use Eightfold\HtmlSpec\Read\HtmlIndex;

use Eightfold\Markup\Element;
use Eightfold\Markup\Html\HtmlElement;

class Html
{
    public static function __callStatic(string $element, array $elements)
    {
        if (HtmlIndex::init()->hasComponentNamed($element)) {
            return HtmlElement::fold($element, ...$elements);
        }
        return Element::fold($element, ...$elements);
    }
}
