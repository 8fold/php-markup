<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\UIKit;

use League\CommonMark\Extension\Table\TableExtension;

/**
 * @group Markdown
 */
class MarkdownTest extends TestCase
{
    private function doc()
    {
        return <<< EOD
        # Heading

        Content
        EOD;
    }

    private function docTable()
    {
        return <<< EOD
        |Header 1 |Header 2 |
        |:--------|:--------|
        |Cell 1   |Cell 2   |
        EOD;
    }

    /**
     * @test
     */
    public function basic()
    {
        AssertEquals::applyWith(
            '<h1>Heading</h1><p>Content</p>',
            "string",
            30.48, // 13.06, // 12.69, // 11.83, // 11.8,
            1868 // 1758 // 1658 // 1100
        )->unfoldUsing(
            UIKit::markdown($this->doc())
        );

        AssertEquals::applyWith(
            '<p>Hello, World!</p>',
            "string",
            0.84, // 0.22, // 0.18, // 0.16,
            42 // 39
        )->unfoldUsing(
            UIKit::markdown("Hello, World!")
        );
    }

    /**
     * @test
     */
    public function replacements()
    {
        AssertEquals::applyWith(
            '<p>Heading</p><p>Content</p>',
            "string",
            12.97, // 11.24,
            1092
        )->unfoldUsing(
            UIKit::markdown($this->doc())
                ->markdownReplacements(["# " => ""])
        );

        AssertEquals::applyWith(
            'Content',
            "string",
            12.55, // 11.83,
            1091
        )->unfoldUsing(
            UIKit::markdown($this->doc())
                ->markdownReplacements(["# Heading" => ""])
                ->htmlReplacements(["<p>" => "", "</p>" => ""])
        );
    }

    /**
     * @test
     */
    public function remove()
    {
        AssertEquals::applyWith(
            '<p>Content</p>',
            "string",
            13.33,
            1091
        )->unfoldUsing(
            UIKit::markdown($this->doc())
                ->markdownReplacements(["# Heading" => ""])
        );
    }

    /**
     * @test
     */
    public function default_extensions()
    {
        $expected = '<table><thead><tr><th align="left">Header 1</th><th align="left">Header 2</th></tr></thead><tbody><tr><td align="left">Cell 1</td><td align="left">Cell 2</td></tr></tbody></table>';

        AssertEquals::applyWith(
            $expected,
            "string",
            21.68,
            1459
        )->unfoldUsing(
            UIKit::markdown($this->docTable())->extensions(
                new TableExtension()
            )
        );
    }

    /**
     * @test
     */
    public function testCanPrepend()
    {
        $doc = <<< EOD
        Base
        EOD;

        AssertEquals::applyWith(
            '<h1>Heading</h1><p>Base</p>',
            "string",
            0.98, // 0.88, // 0.86, // 0.59, // 0.47,
            48
        )->unfoldUsing(
            UIKit::markdown($doc)->prepend("# Heading\n\n")
        );
    }
}
