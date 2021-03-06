<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\Div;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Blockquote
 *
 *
 */
class Blockquote extends Div
{
    static public function elementName(): string
    {
        return Elements::blockquote()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            parent::categories(),
            Elements::sectioning()
        );
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::cite()
        );
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'cite', 'element' => 'cite']
        ];
    }
}
