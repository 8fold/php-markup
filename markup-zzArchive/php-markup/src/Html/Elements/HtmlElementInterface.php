<?php

namespace Eightfold\Markup\Html\Elements;

interface HtmlElementInterface
{
    static public function categories(): array;

    static public function contexts(): array;

    static public function defaultAriaRole(): string;
}
