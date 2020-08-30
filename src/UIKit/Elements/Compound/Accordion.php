<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use Eightfold\Shoop\Helpers\Type;
use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESArray;
use Eightfold\Shoop\ESInt;
use Eightfold\Shoop\ESString;
use Eightfold\Shoop\ESBool;

use Eightfold\Markup\UIKit;

class Accordion extends HtmlElement
{
    private $summaryId = "";
    private $summary = "";

    public function __construct(
        string $summaryId,
        $summary,
        ...$content
    )
    {

        $this->summary = (Type::is($summary, ESString::class, "string")) ? $summary : Type::sanitizeType($summary, ESArray::class);
        $this->summaryId = $summaryId;

        $this->content = $content;
        $this->panelId = $this->summaryId ."-panel";

    }

    public function unfold(): string
    {
        $header = UIKit::h2(
            UIKit::button(
                $this->summary
            )->attr(
                "aria-expanded true",
                "id {$this->summaryId}",
                "aria-controls {$this->panelId}"
            )
        )->attr("is accordion")->unfold();
        $panel = UIKit::div(
            ...$this->content
        )->attr(
            "is accordion-panel",
            "tabindex -1",
            "role region",
            "aria-hidden false",
            "id {$this->panelId}",
            "aria-labelledby {$this->summaryId}"
        )->unfold();
        return Shoop::string($header)->plus($panel);
    }
}
