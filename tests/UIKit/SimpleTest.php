<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\UIKit;

/**
 * @group Simple
 */
class SimpleTest extends TestCase
{
    /**
     * @test
     */
    public function uikit_falls_back_to_html()
    {
        // For 0.2.0 was 11.25ms
        AssertEquals::applyWith(
            '<p>Hello!</p>',
            "string",
            8.48, // 7.75, // 7.29,
            573
        )->unfoldUsing(
            UIKit::p("Hello!")
        );
    }

    /**
     * @test
     */
    public function anchor()
    {
        // For 0.2.0 was 13.5ms
        AssertEquals::applyWith(
            '<a href="http://example.com">Hello, World!</a>',
            "string",
            4.49,
            18
        )->unfoldUsing(
            UIKit::anchor(
                'Hello, World!',
                'http://example.com'
            )->unfold()
        );

        AssertEquals::applyWith(
            '<a id="hello" href="http://example.com">Hello, World!</a>',
            "string",
            5.06, // 4.04, // 1.97, // 1.76, // 1.55, // 1.33,
            1.09
        )->unfoldUsing(
            UIKit::anchor(
                "Hello, World!",
                "http://example.com"
            )->attr("id hello")->unfold()
        );
    }

    /**
     * @test
     */
    public function simple_lists()
    {
        AssertEquals::applyWith(
            '<ul><li>hello</li><li>good-bye</li></ul>',
            "string",
            6.34, // 4.93, // 4.69, // 3.8,
            72 // 8
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->unfold()
        );

        AssertEquals::applyWith(
            '<ol><li>hello</li><li>good-bye</li></ol>',
            "string",
            3.65, // 3.59, // 3.56, // 2.23, // 2.19, // 2.1,
            2.66
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->ordered()->unfold()
        );

        AssertEquals::applyWith(
            '<dl><dt>hello</dt><dd>good-bye</dd></dl>',
            "string",
            3.52, // 3.2,
            1
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->description()->unfold()
        );

        AssertEquals::applyWith(
            '<dl><dt>hello</dt><dd>good-bye</dd><dt>hello</dt><dd>good-bye</dd><dd>good-bye</dd></dl>',
            "string",
            5.25, // 4.59, // 4.49,
            1
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye",
                "hello",
                "good-bye",
                "good-bye"
            )->description(1, 3)->unfold()
        );
    }

    /**
     * @test
     */
    public function images()
    {
        AssertEquals::applyWith(
            '<img src="https://path.to/image.jpg" alt="Alt text">',
            "string",
            3.94, // 3.31, // 2.37, // 2.3, // 2.03,
            3
        )->unfoldUsing(
            UIKit::image("Alt text", "https://path.to/image.jpg")
        );
    }
}
