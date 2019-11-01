<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use League\CommonMark\CommonMarkConverter;

// use League\CommonMark\Converter;
// use League\CommonMark\DocParser;
// use League\CommonMark\Environment;
// use League\CommonMark\HtmlRenderer;
// use Webuni\CommonMark\TableExtension\TableExtension;

/**
 * Markdown
 *
 * The markdown component is actually a wrapper the PHP League's Commonmark library.
 *
 * Optional keys
 *
 * - **content:** The Markdown string to convert to HTML.
 * - **attributes:** The Commonmark settings to use in the conversion. If empty, the
 *                   Commonmark default settings will be used. (Note: Not implemented.)
 */
class Markdown extends HtmlElement
{
    private $markdown = '';

    public function __construct(string $markdown)
    {
        $this->markdown = $markdown;
    }

    public function compile(string ...$attributes): string
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        // $environment = Environment::createCommonMarkEnvironment();
        // $environment->addExtension(new TableExtension());

        // $converter = new Converter(
        //     new DocParser($environment),
        //     new HtmlRenderer($environment)
        // );

        return $converter->convertToHtml($this->markdown);
    }
}
