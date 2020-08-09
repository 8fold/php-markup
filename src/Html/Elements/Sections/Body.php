<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Shoop\ESArray;

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
class Body extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::body()[0];
    }

    static public function categories(): array
    {
        return Elements::sectioningRoot();
    }

    static public function contexts(): array
    {
        return Elements::html();
    }

    static public function contentModel(): array
    {
        return Elements::flow();
    }

    static public function optionalEventAttributes(): ESArray
    {
        return ESArray::fold([])
            ->plus(...EventOn::globals())->plus(...EventOn::afterprint())
            ->plus(...EventOn::beforeprint())->plus(...EventOn::beforeunload())
            ->plus(...EventOn::hashchange())->plus(...EventOn::message())
            ->plus(...EventOn::offline())->plus(...EventOn::online())
            ->plus(...EventOn::pagehide())->plus(...EventOn::pageshow())
            ->plus(...EventOn::popstate())->plus(...EventOn::storage())
            ->plus(...EventOn::unload());

        return array_merge(
            EventOn::globals(),
            EventOn::afterprint(),
            EventOn::beforeprint(),
            EventOn::beforeunload(),
            EventOn::hashchange(),
            EventOn::message(),
            EventOn::offline(),
            EventOn::online(),
            EventOn::pagehide(),
            EventOn::pageshow(),
            EventOn::popstate(),
            EventOn::storage(),
            EventOn::unload()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'document';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::application();
    }
}
