<?php

namespace Eightfold\Markup\Html\Elements\Embedded;

use Eightfold\Markup\Html\Elements\Embedded\Embed;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Video
 *
 *
 */
class Video extends Embed
{
    static public function elementName(): string
    {
        return Elements::video()[0];
    }

    static public function categories(): array
    {
        // TODO: Interactive if controls attribute present
        return parent::categories();
    }

    static protected function contentModel(): array
    {
        // TODO: If the element has a src attribute: zero or more track elements, then
        //       transparent, but with no media element descendants. If the element
        //       does not have a src attribute: zero or more source elements, then
        //       zero or more track elements, then transparent, but with no media
        //       element descendants.
        return array_merge(
            Elements::track(),
            Elements::source(),
            Elements::text()
        );
    }

    static public function optionalAttributes(): array
    {
        $return = array_merge(
            parent::optionalAriaAttributes(),
            Content::crossorigin(),
            Content::poster(),
            Content::preload(),
            Content::autoplay(),
            Content::mediagroup(),
            Content::loop(),
            Content::muted(),
            Content::controls()
        );
        unset($return['type']);
        return $return;
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::application()
        );
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'sources', 'element' => 'source', 'multiple' => true],
            ['key' => 'tracks', 'element' => 'track', 'multiple' => true]
        ];
    }
}
