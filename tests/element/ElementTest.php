<?php

namespace Eightfold\Markup\Tests\Element;

use PHPUnit\Framework\TestCase;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Element;

class ElementTest extends TestCase
{
    public function testHtmlComponent()
    {
        $expected = '<html></html>';

        $result = Element::fold("html");
        $this->assertSame($expected, $result->unfold());

        $expected = '<html id="my-component"></html>';
        $result = Element::fold("html")->unfold("id my-component");
        $this->assertSame($expected, $result);

        $result = Element::fold("html")->attr("id my-component")->unfold();
        $this->assertSame($expected, $result);
    }

    public function testParagraphSpanComponent()
    {
        $expected = '<p><span>Hello, World!</span></p>';
        $result = Element::fold("p",
            Element::fold("span", "Hello, World!")
        )->unfold();
        $this->assertSame($expected, $result);
    }

    public function testButtonWebComponentExtension()
    {
        $expected = '<button is="my-button">Save</button>';
        $result = Element::fold("my_button", "Save")
            ->extends('button')->unfold();
        $this->assertSame($expected, $result);
    }

    public function testPage()
    {
        $expected = '<html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component">Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>';
        $result = Element::fold('html',
                          Element::fold('head',
                                Element::fold('title', 'Hello, World!')
                              , Element::fold('style')
                            )
                        , Element::fold('body',
                              Element::fold('img')
                                ->omitEndTag()
                                ->attr('src http://example.com', 'alt A picture of the world')
                            , Element::fold('my_component', 'Hello, World!')
                                ->extends('p')
                            , Element::fold('my_link', [], 'World Domination')
                                ->attr('href http://example.com/domination')
                            , '<p>Done!</p>'
                          )
                    )->unfold();
        $this->assertSame($expected, $result);
    }

    public function testAttributes()
    {
        $expected = '<container id="hello">';
        $actual = Element::fold("container")->attr("id hello")->omitEndTag();
        $this->assertSame($expected, $actual->unfold());

        $expected = '<container id="goodbye">';
        $actual = $actual->attr("id goodbye");
        $this->assertSame($expected, $actual->unfold());

        $expected = '<container id="hi">';
        $actual = $actual->unfold("id hi");
        $this->assertSame($expected, $actual);
    }
}
