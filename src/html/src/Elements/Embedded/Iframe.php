<?php

namespace Eightfold\Html\Elements\Embedded;

use Eightfold\Html\Elements\Embedded\Embed;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Iframe
 *
 * 
 */
class Iframe extends Embed
{
    static public function elementName(): string 
    { 
        return Elements::iframe()[0]; 
    }

    static protected function contentModel(): array
    {
        return Elements::text();
    }

    static public function requiredAttributes(): array
    {
        return [];
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            Content::src(),
            Content::srcdoc(),
            Content::name(),
            Content::sandbox(),
            Content::width(),
            Content::height()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::application(),
            AriaRoles::document(),
            AriaRoles::img(),
            AriaRoles::presentation()
        );
    }    
}
