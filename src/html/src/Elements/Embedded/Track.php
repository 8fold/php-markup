<?php

namespace Eightfold\Html\Elements\Embedded;

use Eightfold\Html\Elements\Embedded\Source;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Track
 *
 * 
 */
class Track extends Source
{
    static public function elementName(): string 
    { 
        return Elements::track()[0]; 
    }

    static public function optionalAttributes(): array
    {
        $return = array_merge(
            parent::optionalAriaAttributes(),
            Content::kind(),
            Content::srclang(),
            Content::label(),
            Content::default()
        );
        unset($return['type']);
        return $return;        
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
