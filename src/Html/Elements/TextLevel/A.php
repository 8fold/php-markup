<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

class A extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::a()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::interactive(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        // TODO: Transparent, but there must be no interactive content descendant.
        return Elements::text();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
                    Content::href(),
                    Content::target(),
                    Content::download(),
                    Content::rel(),
                    Content::hreflang(),
                    Content::type()
                );

        return parent::optionalAttributes()->plus(...$extras);
        // return ESArray::fold(array_merge(
        //             parent::optionalAttributes(),
        //             Content::href(),
        //             Content::target(),
        //             Content::download(),
        //             Content::rel(),
        //             Content::hreflang(),
        //             Content::type()
        //         ));
    }

    static public function defaultAriaRole(): string
    {
        return 'link';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold([
                    AriaRoles::button(),
                    AriaRoles::checkbox(),
                    AriaRoles::menuitem(),
                    AriaRoles::menuitemcheckbox(),
                    AriaRoles::menuitemradio(),
                    AriaRoles::tab(),
                    AriaRoles::treeitem()
                ]);
    }
}
