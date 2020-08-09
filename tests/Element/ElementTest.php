<?php

namespace Eightfold\Markup\Tests\Element;

use Eightfold\Markup\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Element;

class ElementTest extends TestCase
{
    public function testEmptyArguments()
    {
        $expected = [[], false];
        $actual = Element::fold("hello")->args();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function testEmptyArgumentsWithContent()
    {
        $expected = [Element::fold("element"), [], false];
        $actual = Element::fold(
            "hello",
            Element::fold("element")
        )->args();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function testAttribute()
    {
        $expected = [Element::fold("element"), ["id something"], false];
        $actual = Element::fold(
            "hello",
            Element::fold("element"),
            ["id something"]
        )->args();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function testFullFold()
    {
        $expected = [Element::fold("element"), [], true];
        $actual = Element::fold(
            "hello",
            Element::fold("element"),
            true
        )->args();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function testEmptyAttributes()
    {
        $expected = [];
        $actual = Element::fold("elem")->attrList(false);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testAttributeListAsArray()
    {
        $expected = ["id hello"];
        $actual = Element::fold("elem")->attr("id hello")->attrList();
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testAttributeListAsDictionary()
    {
        $expected = ["id" => "hello"];
        $actual = Element::fold("elem")->attr("id hello")->attrList(false);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testUnfoldWithAttribute()
    {
        $expected = '<container id="hello">';
        $actual = Element::fold("container")->attr("id hello")->omitEndTag(true);
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testOverwriteAttributes()
    {
        $expected = '<container id="goodbye">';
        $actual = Element::fold("container")->attr("id hello")->omitEndTag(true)->attr("id goodbye");
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testUnfoldWithEndTag()
    {
        $expected = '<html></html>';
        $result = Element::fold("html");
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testUnfoldWithoutEndTag()
    {
        $expected = '<img>';
        $result = Element::fold("img", true);
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testUnfoldWithAttr()
    {
        $expected = '<html id="my-component"></html>';
        $result = Element::fold("html")->attr("id my-component")->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    // public function testStaticCall()
    // {
    //     $expected = '<html></html>';
    //     $actual = Element::html();
    //     $this->assertEqualsWithPerformance($expected, $actual->unfold());
    // }

    public function testParagraphSpanComponent()
    {
        $expected = '<p><span>Hello, World!</span></p>';
        $result = Element::fold("p",
            Element::fold("span", "Hello, World!")
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testButtonWebComponentExtension()
    {
        $expected = '<button is="my-button">Save</button>';
        $result = Element::fold("button", "Save")
            ->attr("is my-button")->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testPage()
    {
        $expected = '<html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component">Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>';
        $result = Element::fold('html',
              Element::fold('head',
                  Element::fold('title', 'Hello, World!'),
                  Element::fold('style')
                ),
            Element::fold('body',
                  Element::fold('img')
                    ->omitEndTag(true)
                    ->attr(
                        'src http://example.com',
                        'alt A picture of the world'
                    ),
                Element::fold('p', 'Hello, World!', ['is my-component']),
                Element::fold("my-link", 'World Domination')
                    ->attr('href http://example.com/domination'),
                '<p>Done!</p>'
            )
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }
}
