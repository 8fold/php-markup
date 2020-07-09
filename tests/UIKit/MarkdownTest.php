<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;

use Eightfold\CommonMarkAbbreviations\AbbreviationExtension;

class MarkdownTest extends TestCase
{
    public function testGeneral($value='')
    {
        $doc = <<< EOD
        # Heading

        Content
        EOD;

        $expected = '<h1>Heading</h1><p>Content</p>';
        $actual = UIKit::markdown($doc);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<p>Heading</p><p>Content</p>';
        $actual = UIKit::markdown($doc)->markdownReplacements(["# " => ""]);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<p>Content</p>';
        $actual = UIKit::markdown($doc)->markdownReplacements(["# Heading" => ""]);
        $this->assertEquals($expected, $actual->unfold());

        $expected = 'Content';
        $actual = UIKit::markdown($doc)
            ->markdownReplacements(["# Heading" => ""])
            ->htmlReplacements(["<p>" => "", "</p>" => ""]);
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testDefaultExtensions($value='')
    {
        $doc = <<< EOD
        |Header 1 |Header 2 |
        |:--------|:--------|
        |Cell 1   |Cell 2   |

        - [ ] Task 1
        - [x] Task 2
        EOD;

        // No extensions
        $expected = '<p>|Header 1 |Header 2 ||:--------|:--------||Cell 1   |Cell 2   |</p><ul><li>[ ] Task 1</li><li>[x] Task 2</li></ul>';
        $actual = UIKit::markdown($doc);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<table><thead><tr><th align="left">Header 1</th><th align="left">Header 2</th></tr></thead><tbody><tr><td align="left">Cell 1</td><td align="left">Cell 2</td></tr></tbody></table><ul><li><input disabled="" type="checkbox"> Task 1</li><li><input checked="" disabled="" type="checkbox"> Task 2</li></ul>';
        $actual = UIKit::markdown($doc)->extensions();
        $this->assertEquals($expected, $actual->unfold());

        $doc = <<<EOD
        [.abbr](abbreviation)

        <abbr title="abbreviation">abbr</abbr>
        EOD;
        $expected = '<p><abbr title="abbreviation">abbr</abbr></p><p><abbr title="abbreviation">abbr</abbr></p>';
        $actual = UIKit::markdown($doc, ['html_input' => 'allow'])
            ->extensions(AbbreviationExtension::class);
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testCanPrepend()
    {
        $doc = <<< EOD
        Base
        EOD;
        $prepend = "# Heading\n\n";
        $expected = '<h1>Heading</h1><p>Base</p>';
        $actual = UIKit::markdown($doc)->prepend($prepend);
        $this->assertSame($expected, $actual->unfold());
    }
}
