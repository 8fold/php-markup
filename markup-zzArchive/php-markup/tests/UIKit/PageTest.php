<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;
use Eightfold\Markup\UIKit;
use Eightfold\Markup\UIKit\FormControls\InputText;

class PageTest extends TestCase
{
    public function testWebViewBase()
    {
        $expected = '<!doctype html><html lang="en"><head><title>UIKit</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head><body><p>Hello, World!</p></body></html>';
        $result = UIKit::webView(
            "UIKit",
            UIKit::p("Hello, World!")
        )->meta(
              UIKit::meta()->attr("charset utf-8")
            , UIKit::meta()->attr("name viewport", "content width=device-width, initial-scale=1")
        )->unfold();
        $this->assertEquals($expected, $result);
    }
}
