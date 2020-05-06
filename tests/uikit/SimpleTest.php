<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;
use Eightfold\Markup\FormControls\InputText;

class SimpleTest extends TestCase
{
    public function testCanGetHtmlElementFromUIKitCall()
    {
        $expected = "<p>Hello!</p>";
        $result = UIKit::p("Hello!");
        $this->assertEquals($expected, $result->unfold());
    }

    public function testLinkBase()
    {
        $expected = '<a href="http://example.com">Hello, World!</a>';
        $result = UIKit::anchor(
            'Hello, World!',
            'http://example.com'
        )->unfold();
        $this->assertEquals($expected, $result);
    }

    // public function testSimpleTable()
    // {
    //     $expected = '<table><caption>Hello table</caption><thead><tr><th>Hello</th></tr></thead><tbody><tr><td>world</td></tr><tr><td>world2</td></tr></tbody></table>';
    //     $result = UIKit::tableWith(
    //         ['world'],
    //         ['world2']
    //     )->headers('Hello')->caption('Hello table')->unfold();
    //     $this->assertEquals($expected, $result);
    // }

    public function testSimpleList()
    {
        $expected = '<ul><li>hello</li><li>good-bye</li></ul>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleOrderedList()
    {
        $expected = '<ol><li>hello</li><li>good-bye</li></ol>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->ordered()->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleDefinitionList()
    {
        $expected = '<dl><dt>hello</dt><dd>good-bye</dd></dl>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->definition()->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleDLWithDefinedTerms()
    {
        $expected = '<dl><dt>hello</dt><dd>good-bye</dd><dt>hello</dt><dd>good-bye</dd><dd>good-bye</dd></dl>';
        $result = UIKit::listWith(
            'hello',
            'good-bye',
            'hello',
            'good-bye',
            'good-bye'
        )->description(1, 3)->unfold();
        $this->assertEquals($expected, $result);
    }
}
