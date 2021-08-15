<?php

namespace Eightfold\Markup\Tests\Element;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Element;

use Eightfold\Markup\Filters\AttrDictionary;

/**
 * @group Element
 * @group 1.0.0
 */
class ElementTest extends TestCase
{
    /**
     * @test
     */
    public function from_fold()
    {
        AssertEquals::applyWith(
            '<container id="hello">',
            "string",
            14.76, // 14.59, // shoopified 7.17, // 5.29, // 4.56, // 4.02,
            475 // 437 // 436 // 433 // 427 // 426 // 401 // 397 // 394 // 393
        )->unfoldUsing(
            Element::fold("container")->attr("id hello")->omitEndTag(true)
        );

        AssertEquals::applyWith(
            '<container id="goodbye">',
            "string",
            3.36, // 1.9, // 0.85, // 0.5, // 0.42, // 0.27, // 0.26, // 0.25,
            1
        )->unfoldUsing(
            Element::fold("container")->attr("id hello")->omitEndTag(true)
                ->attr("id goodbye")
        );

        AssertEquals::applyWith(
            '<html></html>',
            "string",
            4.33, // 3.68, // 3.61,
            374
        )->unfoldUsing(
            Element::fold("html")
        );

        AssertEquals::applyWith(
            '<p><span>Hello, World!</span></p>',
            "string",
            7.08, // 3.95,
            470 // 311
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
            "string",
            4.08, // 3.35, // 3.33,
            304 // 300
        )->unfoldUsing(
            new Element("img", [], true)
        );

        AssertEquals::applyWith(
            '<img src="/path" alt="description">',
            "string",
            4.47, // 4.46,
            393
        )->unfoldUsing(
            new Element("img", ["src /path", "alt description"], true)
        );

        AssertEquals::applyWith(
            '<a href="/path"></a>',
            "string",
            1.21, // 1.03, // 0.32, // 0.3, // 0.27, // 0.21, // 0.2,
            1
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
            3.56, // 3.42,
            305
        )->unfoldUsing(
            Element::fold("hello")->args()
        );
    }

    /**
     * @test
     */
    public function attribute_list()
    {
        AssertEquals::applyWith(
            ["id" => "hello"],
            "array",
            4.54, // 3.84, // 3.45, // 3.43, // 0.001
            307
        )->unfoldUsing(
            AttrDictionary::apply()->unfoldUsing(["id hello"])
        );

        AssertEquals::applyWith(
            ["id hello"],
            "array",
            0.23, // 0.18,
            15
        )->unfoldUsing(
            (new Element("hello", ["id hello"]))->attrList()
        );

        AssertEquals::applyWith(
            ["id" => "hello"],
            "array",
            0.28, // 0.21, // 0.07,
            1
        )->unfoldUsing(
            (new Element("hello", ["id hello"]))->attrList(false)
        );

        AssertEquals::applyWith(
            ["id" => "hello"],
            "array",
            0.81, // 0.42, // 0.25, // 0.21, // 0.18, // 0.17, // increase shoop 0.13, // 0.11, // 0.09,
            1
        )->unfoldUsing(
            Element::fold("hello")->attr("id hello")->attrList(false)
        );
    }

    /**
     * @test
     */
    public function testPage()
    {
        AssertEquals::applyWith(
            '<html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component" required>Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>',
            "string",
            16.26, // 13.11, // 5.71,
            397
        )->unfoldUsing(
            Element::fold('html',
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
                    Element::fold('p', 'Hello, World!')->attr("is my-component", "required required"),
                    Element::fold("my-link", 'World Domination')
                        ->attr('href http://example.com/domination'),
                    '<p>Done!</p>'
                )
            )->unfold()
        );
    }
}
