<?php

namespace Eightfold\UIKit\Tests;

use Eightfold\UIKit\Tests\BaseTest;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\FormControls\InputText;

class PageTest extends BaseTest
{
    public function testWebViewBase()
    {
        $expected = '<!doctype html><html lang="en"><head><title>UIKit</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head><body><p>Hello, World!</p></body></html>';
        $result = UIKit::webView(
              "UIKit"
            , UIKit::p(UIKit::text("Hello, World!"))
        )->headMeta(                
              UIKit::meta()->attr("charset utf-8")
            , UIKit::meta()->attr("name viewport", "content width=device-width, initial-scale=1")
        )->compile();
        $this->assertEquals($expected, $result);
    }
}
