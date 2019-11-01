<?php

namespace Eightfold\Html\Tests;

use Eightfold\Html\Tests\BaseTest;

use Eightfold\Html\Html;

use Eightfold\HtmlComponent\Component;

class HtmlTest extends BaseTest
{
    public function testHtmlBase()
    {
        $expected = '<!doctype html><html lang="en"></html>';
        $result = Html::html()->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testHtmlRemovesDeprecatedAttributes()
    {
        $expected = '<!doctype html><html lang="en"></html>';
        $result = Html::html()
            ->attr('manifest something.cache')
            ->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testHtmlCanHaveId()
    {
        $expected = '<!doctype html><html id="hello" lang="en"><head><title>Hello, World!</title></head></html>';
        $result = Html::html(
            Html::head(
                Html::title('Hello, World!')
            )
        )->attr('id hello')->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testMetaCanHaveAttributes()
    {
        $expected = '<!doctype html><html lang="en"><head><title>Hello, World!</title><meta charset="utf-8"></head></html>';
        $result = Html::html(
            Html::head(
                Html::title('Hello, World!'),
                Html::meta()->attr('charset utf-8')
            )
        )->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testMetaBase()
    {
        $expected = '<meta charset="utf-8">';
        $result = Html::meta()->attr('charset utf-8')->unfold();
        $this->assertEquality($expected, $result);
    }

    /**
     * @todo Have child elements check their context before compiling.
     *
     * @return [type] [description]
     */
    public function testHtmlContentCannotBeAnythingButHeadAndBody()
    {
        $expected = '<!doctype html><html lang="en"><head><title>Hello, World!</title></head><body><p>Hello!</p></body></html>';
        $result = '<!doctype html><html lang="en"><head><title>Hello, World!</title></head><body><p>Hello!</p></body></html>';

        $this->assertEquality($expected, $result);
    }

    public function testIsCanHavAttributes()
    {
        $expected = '<p is="my-component" class="hello">Hello</p>';
        $result = Html::p('Hello')
            ->attr('class hello', "is my-component")
            ->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testFormIsCanHavAttributes()
    {
        $expected = '<form is="my-component" class="hello" action="/somewhere" method="post"></form>';
        $result = Html::form()
            ->attr('class hello', 'method post', 'action /somewhere', "is my-component")
            ->unfold();
        $this->assertEquality($expected, $result);
    }
}
