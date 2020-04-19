<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use League\CommonMark\Extension\Table\TableExtension;

use Eightfold\Shoop\Shoop;

class Markdown extends HtmlElement
{
    private $markdown = '';

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
        // Obtain a pre-configured Environment with all the standard CommonMark parsers/renderers ready-to-go
        $environment = Environment::createCommonMarkEnvironment();

        // Add this extension
        $environment->addExtension(new TableExtension());

        // Instantiate the converter engine and start converting some Markdown!
        $converter = new Converter(new DocParser($environment), new HtmlRenderer($environment));

        return $converter->convertToHtml($this->markdown);

        $converter = new CommonMarkConverter($this->config);

        return $converter->convertToHtml($this->markdown);
    }
}
