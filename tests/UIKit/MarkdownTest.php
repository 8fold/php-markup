<?php

namespace Eightfold\Markup\Tests\UIKit;

use Eightfold\Markup\Tests\TestCase;
use Eightfold\Foldable\Tests\TestEqualsPerformance as AssertEquals;

use Eightfold\Markup\UIKit;

use Eightfold\CommonMarkAbbreviations\AbbreviationExtension;

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

        - [ ] Task 1
        - [x] Task 2
        EOD;
    }

    /**
     * @test
     */
    public function basic()
    {
        AssertEquals::applyWith(
            '<h1>Heading</h1><p>Content</p>',
            "string"
        )->unfoldUsing(
            UIKit::markdown($this->doc())
        );
        // $expected = ;
        // $actual = ;
        // $this->assertEqualsWithPerformance($expected, $actual->unfold(), 15.25);
        //
        $expected = "<p>Hello, World!</p>";
        $actual = UIKit::markdown("Hello, World!");
        $this->assertSame($expected, $actual->unfold());
    }

    public function testReplacement()
    {
        $expected = '<p>Heading</p><p>Content</p>';
        $actual = UIKit::markdown($this->doc())
            ->markdownReplacements(["# " => ""]);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testRemove()
    {
        $expected = '<p>Content</p>';
        $actual = UIKit::markdown($this->doc())
            ->markdownReplacements(["# Heading" => ""]);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testReplacements()
    {
        $expected = 'Content';
        $actual = UIKit::markdown($this->doc())
            ->markdownReplacements(["# Heading" => ""])
            ->htmlReplacements(["<p>" => "", "</p>" => ""]);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testNoExtensions()
    {
        // No extensions
        $expected = '<p>|Header 1 |Header 2 ||:--------|:--------||Cell 1   |Cell 2   |</p><ul><li>[ ] Task 1</li><li>[x] Task 2</li></ul>';
        $actual = UIKit::markdown($this->docTable());
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testDefaultExtensions()
    {
        $expected = '<table><thead><tr><th align="left">Header 1</th><th align="left">Header 2</th></tr></thead><tbody><tr><td align="left">Cell 1</td><td align="left">Cell 2</td></tr></tbody></table><ul><li><input disabled="" type="checkbox"> Task 1</li><li><input checked="" disabled="" type="checkbox"> Task 2</li></ul>';
        $actual = UIKit::markdown($this->docTable())->extensions();
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testAbbreviationExtensionAndAllowHtml()
    {
        $doc = <<<EOD
        [.abbr](abbreviation)

        <abbr title="abbreviation">abbr</abbr>
        EOD;
        $expected = '<p><abbr title="abbreviation">abbr</abbr></p><p><abbr title="abbreviation">abbr</abbr></p>';
        $actual = UIKit::markdown($doc, ['html_input' => 'allow'])
            ->extensions(AbbreviationExtension::class);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testCanPrepend()
    {
        $doc = <<< EOD
        Base
        EOD;
        $prepend = "# Heading\n\n";
        $expected = '<h1>Heading</h1><p>Base</p>';
        $actual = UIKit::markdown($doc)->prepend($prepend);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }
}
