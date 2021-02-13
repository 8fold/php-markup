<?php

namespace Eightfold\UIKit\Tests;

use Eightfold\UIKit\Tests\BaseTest;

use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\FormControls\InputText;

class SimpleTest extends BaseTest
{
    public function testLinkBase()
    {
        $expected = '<a href="http://example.com">Hello, World!</a>';
        $result = UIKit::link(
            'Hello, World!',
            'http://example.com'
        )->compile();
        $this->assertEquals($expected, $result);
    }

    public function testCompileGlyphBase()
    {
        $expected = '<i class="fa fa-address-book" aria-hidden="true"></i>';
        $result = UIKit::glyph('address-book')->compile();
        $this->assertEquals($expected, $result);
    }

    public function testCompileLinkWithGlyphBase()
    {
        $expected = '<a class="icon fa-address-book ef-current something" href="http://example.com">Hello, World!</a>';
        $result = UIKit::link('Hello, World!', 'http://example.com')
            ->glyph('address-book')
            ->current(true)
            ->compile('class something');
        $this->assertEquals($expected, $result);
    }

    public function testSimpleTable()
    {
        $expected = '<table><caption>Hello table</caption><thead><tr><th>Hello</th></tr></thead><tbody><tr><td>world</td></tr><tr><td>world2</td></tr></tbody></table>';
        $result = UIKit::tableWith(
            ['world'],
            ['world2']
        )->headers('Hello')->caption('Hello table')->compile();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleList()
    {
        $expected = '<ul><li>hello</li><li>good-bye</li></ul>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->compile();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleOrderedList()
    {
        $expected = '<ol><li>hello</li><li>good-bye</li></ol>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->ordered()->compile();
        $this->assertEquals($expected, $result);
    }

    public function testSimpleDefinitionList()
    {
        $expected = '<dl><dt>hello</dt><dd>good-bye</dd></dl>';
        $result = UIKit::listWith(
            'hello',
            'good-bye'
        )->definition()->compile();
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
        )->definition(1, 3)->compile();
        $this->assertEquals($expected, $result);
    }
}
