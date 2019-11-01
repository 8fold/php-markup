<?php

namespace Eightfold\Html\Data\Attributes;

use Eightfold\Html\Data\Attributes\Content;
use Eightfold\Html\Data\Attributes\Aria;

abstract class Ordered
{
    public static function order()
    {
        return array_merge(
            self::identity(),
            self::selector(),
            self::dimension(),
            self::language(),
            self::relationship(),
            self::microdata(),
            self::descriptor(),
            self::configuration()
        );
    }

    private static function identity()
    {
        return array_merge(
            Content::is(),
            Aria::role(),
            Content::id()
        );
    }

    private static function selector()
    {
        return array_merge(
            Content::class(),
            Content::style(),
            Content::type(),
            Content::media(),
            Content::tabindex(),
            Content::accesskey()
        );
    }
    
    private static function dimension()
    {
        return array_merge(Content::width(), Content::height());
    }

    private static function language()
    {
        return array_merge(
            Content::lang(),
            Content::srclang(),
            Content::hreflang(),
            Content::dir(),
            Content::translate()
        );
    }

    private static function relationship()
    {
        return array_merge(
            Content::src(),
            Content::rel(), // will process sizes if icon
            Content::href(),
            Content::target() // will add underscore
        );
    }

    private static function microdata()
    {
        return array_merge(
            Content::itemtype(),
            Content::itemref(),
            Content::itemprop()
        );
    }

    private static function descriptor()
    {
        return array_merge(
            Content::title(),
            Content::name(),
            Content::httpEquiv(),
            Content::charset(),
            Content::alt(),
            Content::value(),
            Content::content(),
            Content::manifest()
        );
    }

    private static function configuration()
    {
        return array_merge(
            Content::contenteditable(),
            Content::spellcheck(),
            Content::start()
        );
    }  
}
