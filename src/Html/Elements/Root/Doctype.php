<?php

namespace Eightfold\Markup\Html\Elements\Root;

class Doctype
{
    static public function build(): string
    {
        return '<!doctype html>';
    }
}
