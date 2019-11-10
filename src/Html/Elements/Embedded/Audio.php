<?php

namespace Eightfold\Markup\Html\Elements\Embedded;

use Eightfold\Markup\Html\Elements\Embedded\Video;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Audio
 *
 *
 */
class Audio extends Video
{
    static public function elementName(): string
    {
        return Elements::audio()[0];
    }

    static public function categories(): array
    {
        // TODO: If controls attribute present interactive and palpable.
        return parent::categories();
    }
}
