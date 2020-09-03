<?php

namespace Eightfold\Markup\Tests\UIKit;

use Eightfold\Markup\Tests\TestCase;
use Eightfold\Foldable\Tests\TestEqualsPerformance as AssertEquals;

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
            4.96
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
            7.72
        )->unfoldUsing(
            UIKit::anchor(
                'Hello, World!',
                'http://example.com'
            )->unfold()
        );

        AssertEquals::applyWith(
            '<a id="hello" href="http://example.com">Hello, World!</a>',
            "string",
            6.63
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
            6.95
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->unfold()
        );

        AssertEquals::applyWith(
            '<ol><li>hello</li><li>good-bye</li></ol>',
            "string",
            1.67
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->ordered()->unfold()
        );

        AssertEquals::applyWith(
            '<dl><dt>hello</dt><dd>good-bye</dd></dl>',
            "string",
            2.18
        )->unfoldUsing(
            UIKit::listWith(
                "hello",
                "good-bye"
            )->description()->unfold()
        );

        AssertEquals::applyWith(
            '<dl><dt>hello</dt><dd>good-bye</dd><dt>hello</dt><dd>good-bye</dd><dd>good-bye</dd></dl>',
            "string",
            2.9 // 2.13
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
            5.5 // 4.37
        )->unfoldUsing(
            UIKit::image("Alt text", "https://path.to/image.jpg")
        );
    }
}
