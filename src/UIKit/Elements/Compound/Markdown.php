<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use League\CommonMark\Extension\Table\TableExtension;

use Eightfold\ShoopExtras\Shoop;

class Markdown extends HtmlElement
{
    private $config = [
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ];

    public function __construct(string $markdown, array $config = [])
    {
        if (count($config) > 0) {
            $this->config = $config;
        }
        $this->markdown = $markdown;
    }

    public function unfold(): string
    {
        return Shoop::markdown($this->markdown)
            ->html([], [], true, true, $this->config);
    }
}
