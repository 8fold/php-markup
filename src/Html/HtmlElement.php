<?php

namespace Eightfold\Markup\Html;

use Eightfold\Markup\Element;

use Eightfold\HtmlSpec\Read\HtmlIndex;

use Eightfold\Markup\Filters\AttrStringHtml;

// TODO: Consider moving to root.
//      Incorporating into HTML has the risk of not generating an element because a method with that name exists.
class HtmlElement extends Element
{
    public function attrString()
    {
        $attributes = $this->attrList(false);
        return AttrStringHtml::apply()->unfoldUsing($attributes);
    }

    public function unfold()
    {
        if (HtmlIndex::init()->hasComponentNamed($this->main) and
            $element = HtmlIndex::init()->componentNamed($this->main) and
            ! $element->acceptsChildren()
        ) {
            $this->omitEndTag = true;

        }
        return parent::unfold();
    }
}
