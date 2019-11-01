<?php

namespace Eightfold\Html\Elements\Forms;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Progress
 *
 * 
 */
class Progress extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::progress()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(), 
            Elements::labelable(), 
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::phrasing(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO:: Phrasing content, but there must be no progress element descendants.
        return Elements::phrasing(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::value(),
            Content::max()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'progressbar';
    }
}
