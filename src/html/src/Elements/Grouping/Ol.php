<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\Grouping\Ul;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Ol
 *
 * 
 */
class Ol extends Ul
{
    static public function elementName(): string 
    { 
        return Elements::ol()[0]; 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::reversed(),
            Content::start(),
            Content::type()
        );
    }   
}
