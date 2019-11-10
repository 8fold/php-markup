<?php

namespace Eightfold\Markup\Html\Elements\Forms;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Textarea
 *
 *
 */
class Textarea extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::textarea()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::interactive(),
            Elements::listed(),
            Elements::labelable(),
            Elements::submittable(),
            Elements::reassociateable(),
            Elements::formAssociated(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        return Elements::text();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::autofocus(),
            Content::autocomplete(),
            Content::cols(),
            Content::dirname(),
            Content::disabled(),
            Content::form(),
            Content::inputmode(),
            Content::maxlength(),
            Content::minlength(),
            Content::name(),
            Content::placeholder(),
            Content::readonly(),
            Content::required(),
            Content::rows(),
            Content::wrap()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'textbox';
    }
}
