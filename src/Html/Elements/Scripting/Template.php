<?php

namespace Eightfold\Markup\Html\Elements\Scripting;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Template
 *
 *
 */
class Template extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::template()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::metadata(),
            Elements::flow(),
            Elements::phrasing(),
            Elements::scriptSupporting()
        );
    }

    static public function contexts(): array
    {
        return array_merge(
            Elements::metadata(),
            Elements::phrasing(),
            Elements::scriptSupporting(),
            Elements::colgroup(),
            Elements::span()
        );
    }

    static public function contentModel(): array
    {
        // TODO: Either: Metadata content.
        //       Or: Flow content.
        //       Or: The content model of ol and ul elements.
        //       Or: The content model of dl elements.
        //       Or: The content model of figure elements.
        //       Or: The content model of ruby elements.
        //       Or: The content model of object elements.
        //       Or: The content model of video and audio elements.
        //       Or: The content model of table elements.
        //       Or: The content model of colgroup elements.
        //       Or: The content model of thead, tbody, and tfoot elements.
        //       Or: The content model of tr elements.
        //       Or: The content model of fieldset elements.
        //       Or: The content model of select elements.
        return array_merge(
            Elements::metadata(),
            Elements::flow()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
