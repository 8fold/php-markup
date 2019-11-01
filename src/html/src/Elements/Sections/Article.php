<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Body
 *
 * 
 */
class Article extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::article()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::sectioning(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::flow(); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::flow(); 
    }

    static public function defaultAriaRole(): string
    {
        return 'article';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::application(),
            AriaRoles::document(),
            AriaRoles::main()
        );
    }    
}
