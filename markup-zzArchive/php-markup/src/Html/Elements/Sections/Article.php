<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

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
