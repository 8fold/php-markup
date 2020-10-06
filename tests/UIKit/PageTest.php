<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\UIKit;

/**
 * @group Page
 * @group 1.0.0
 */
class PageTest extends TestCase
{
    /**
     * @test
     */
    public function web_view()
    {
        AssertEquals::applyWith(
            '<!doctype html><html><head><title>UIKit</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head><body class="theme"><p>Hello, World!</p></body></html>',
            "string",
            13.74, // 10.21 // 9.69 // 9.46
            596
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
