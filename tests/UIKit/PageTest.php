<?php

namespace Eightfold\Markup\Tests\UIKit;

use Eightfold\Markup\Tests\TestCase;
use Eightfold\Foldable\Tests\TestEqualsPerformance as AssertEquals;

use Eightfold\Markup\UIKit;

/**
 * @group Page
 */
class PageTest extends TestCase
{
    /**
     * @test
     * @group current
     */
    public function web_view()
    {
        AssertEquals::applyWith(
            '<!doctype html><html><head><title>UIKit</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head><body class="theme"><p>Hello, World!</p></body></html>',
            "string",
            9.46
        )->unfoldUsing(
            UIKit::webView(
                "UIKit",
                UIKit::p("Hello, World!")
            )->meta(
                UIKit::meta()->attr("charset utf-8"),
                UIKit::meta()->attr(
                    "name viewport",
                    "content width=device-width, initial-scale=1"
                )
            )->bodyAttr("class theme")
        );
    }
}
