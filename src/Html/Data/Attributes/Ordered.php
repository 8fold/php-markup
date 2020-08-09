<?php

namespace Eightfold\Markup\Html\Data\Attributes;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\Aria;

abstract class Ordered
{
    /**
     * These are the attributes we want in a specific order, in that order.
     *
     */
    public static function order()
    {
        return Shoop::array([])
            ->plus(...self::identity())->plus(...self::selector())
            ->plus(...self::dimension())->plus(...self::language())
            ->plus(...self::relationship())->plus(...self::microdata())
            ->plus(...self::descriptor())->plus(...self::configuration());

        // return array_merge(
        //     self::identity(),
        //     self::selector(),
        //     self::dimension(),
        //     self::language(),
        //     self::relationship(),
        //     self::microdata(),
        //     self::descriptor(),
        //     self::configuration()
        // );
    }

    private static function identity()
    {
        return Shoop::array([])
            ->plus(...Content::is())->plus(...Aria::role())
            ->plus(...Content::id());

        return array_merge(
            Content::is(),
            Aria::role(),
            Content::id()
        );
    }

    private static function selector()
    {
        return Shoop::array([])
            ->plus(...Content::class())->plus(...Content::style())
            ->plus(...Content::type())->plus(...Content::media())
            ->plus(...Content::tabindex())->plus(...Content::accesskey());

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
        return Shoop::array([])
            ->plus(...Content::width())->plus(...Content::height());

        return array_merge(Content::width(), Content::height());
    }

    private static function language()
    {
        return Shoop::array([])
            ->plus(...Content::lang())->plus(...Content::srclang())
            ->plus(...Content::hreflang())->plus(...Content::dir())
            ->plus(...Content::translate());

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
        return Shoop::array([])
            ->plus(...Content::src())
            ->plus(...Content::rel()) // will process sizes if icon
            ->plus(...Content::href())
            ->plus(...Content::target()); // will add underscore

        return array_merge(
            Content::src(),
            Content::rel(), // will process sizes if icon
            Content::href(),
            Content::target() // will add underscore
        );
    }

    private static function microdata()
    {
        return Shoop::array([])
            ->plus(...Content::itemtype())
            ->plus(...Content::itemref())
            ->plus(...Content::itemprop());

        return array_merge(
            Content::itemtype(),
            Content::itemref(),
            Content::itemprop()
        );
    }

    private static function descriptor()
    {
        return Shoop::array([])
            ->plus(...Content::title())->plus(...Content::name())
            ->plus(...Content::httpEquiv())->plus(...Content::charset())
            ->plus(...Content::alt())->plus(...Content::value())
            ->plus(...Content::content())->plus(...Content::manifest());

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
        return Shoop::array([])
            ->plus(...Content::contenteditable())
            ->plus(...Content::spellcheck())
            ->plus(...Content::start());

        return array_merge(
            Content::contenteditable(),
            Content::spellcheck(),
            Content::start()
        );
    }
}
