<?php

namespace Eightfold\Markup\Tests\Element;

use Eightfold\Markup\Tests\TestCase;

use Eightfold\Foldable\Tests\TestEqualsPerformance as AssertEquals;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Element;

class ElementTest extends TestCase
{
    /**
     * @test
     */
    public function from_fold()
    {
        AssertEquals::applyWith(
            '<container id="hello">',
            Element::class,
            4.63
        )->unfoldUsing(
            Element::fold("container")->attr("id hello")->omitEndTag(true)
        );

        AssertEquals::applyWith(
            '<container id="goodbye">',
            Element::class,
            0.31
        )->unfoldUsing(
            Element::fold("container")->attr("id hello")->omitEndTag(true)
                ->attr("id goodbye")
        );

        AssertEquals::applyWith(
            '<html></html>',
            Element::class
        )->unfoldUsing(
            Element::fold("html")
        );

        AssertEquals::applyWith(
            '<p><span>Hello, World!</span></p>',
            "string"
        )->unfoldUsing(
            Element::fold("p",
                Element::fold("span", "Hello, World!")
            )->unfold()
        );
    }

    /**
     * @test
     */
    public function self_contained_element()
    {
        AssertEquals::applyWith(
            '<img>',
            Element::class,
            6.07 // 4.23 // 3.36 // 3.33 // 3.13
        )->unfoldUsing(
            new Element("img", [], true)
        );

        AssertEquals::applyWith(
            '<img src="/path" alt="description">',
            Element::class,
            4.25 // 0.41 // 0.4 // 0.35
        )->unfoldUsing(
            new Element("img", ["src /path", "alt description"], true)
        );

        AssertEquals::applyWith(
            '<a href="/path"></a>',
            Element::class,
        )->unfoldUsing(
            new Element("a", ["href /path"], false)
        );
    }

    /**
     * @test
     */
    public function element_only_arguments()
    {
        AssertEquals::applyWith(
            [[], false],
            "array",
            2.48 // 1.91
        )->unfoldUsing(
            Element::fold("hello")->args()
        );
    }

    /**
     * @test
     */
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
                Element::fold('p', 'Hello, World!')->attr("is my-component"),
                Element::fold("my-link", 'World Domination')
                    ->attr('href http://example.com/domination'),
                '<p>Done!</p>'
            )
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }
}
