<?php

namespace Eightfold\Html\Elements\Root;

class Doctype
{
    static public function build(): string
    {
        return '<!doctype html>';
    }
}