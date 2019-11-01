<?php

namespace Eightfold\Shoop\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Shoop\ESElement;

class ElementTest extends TestCase
{
    public function testHtmlComponent()
    {
        $expected = '<html></html>';
        $result = ESElement::fold("html")->unfold('id my-component');
        $this->assertEquals($expected, $result);

        $expected = '<html id="my-component"></html>';
        $result = ESElement::fold("html")->attr("id my-component")->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testParagraphSpanComponent()
    {
        $expected = '<p><span>Hello, World!</span></p>';
        $result = ESElement::fold("p",
            ESElement::fold("span", "Hello, World!")
        )->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testButtonWebComponentExtension()
    {
        $expected = '<button is="my-button">Save</button>';
        $result = ESElement::fold("my_button", "Save")
            ->extends('button')->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testPage()
    {
        $expected = '<html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component">Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>';
        $result = ESElement::fold('html',
                          ESElement::fold('head',
                                ESElement::fold('title', 'Hello, World!')
                              , ESElement::fold('style')
                            )
                        , ESElement::fold('body',
                              ESElement::fold('img')
                                ->omitEndTag()
                                ->attr('src http://example.com', 'alt A picture of the world')
                            , ESElement::fold('my_component', 'Hello, World!')
                                ->extends('p')
                            , ESElement::fold('my_link', [], 'World Domination')
                                ->attr('href http://example.com/domination')
                            , '<p>Done!</p>'
                          )
                    )->unfold();
        $this->assertEquals($expected, $result);
    }
}
