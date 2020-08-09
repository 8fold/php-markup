<?php

namespace Eightfold\Markup\Tests\Html;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

use Eightfold\HtmlComponent\Component;

class HtmlTest extends TestCase
{
    public function testHtmlBase()
    {
        $expected = '<!doctype html><html lang="en"></html>';
        $result = Html::html()->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testHtmlRemovesDeprecatedAttributes()
    {
        $expected = '<!doctype html><html lang="en"></html>';
        $result = Html::html()
            ->attr('manifest something.cache')
            ->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testHtmlCanHaveId()
    {
        $expected = '<!doctype html><html id="hello" lang="en"><head><title>Hello, World!</title></head></html>';
        $result = Html::html(
            Html::head(
                Html::title('Hello, World!')
            )
        )->attr('id hello')->unfold();
        $this->assertEquals($expected, $result);
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
        $this->assertEquals($expected, $result);
    }

    public function testMetaBase()
    {
        $expected = '<meta charset="utf-8">';
        $result = Html::meta()->attr('charset utf-8')->unfold();
        $this->assertEquals($expected, $result);
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

        $this->assertEquals($expected, $result);
    }

    public function testIsCanHavAttributes()
    {
        $expected = '<p is="my-component" class="hello">Hello</p>';
        $result = Html::p('Hello')
            ->attr('class hello', "is my-component")
            ->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testFormIsCanHavAttributes()
    {
        $expected = '<form is="my-component" class="hello" action="/somewhere" method="post"></form>';
        $result = Html::form()
            ->attr('class hello', 'method post', 'action /somewhere', "is my-component")
            ->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testCanHavePlaceholder()
    {
        $expected = '<input type="text" placeholder="hello">';
        $actual = Html::input()->attr("type text", "placeholder hello");
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testCanHaveAriaHidden()
    {
        $expected = '<div aria-hidden="true"></div>';
        $actual = Html::div()->attr("aria-hidden true");
        $this->assertSame($expected, $actual->unfold());
    }

    public function testCanHaveAriaExpanded()
    {
        $expected = '<button aria-expanded="false"></button>';
        $actual = Html::button()->attr("aria-expanded false");
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testCanHaveAriaLabelledBy()
    {
        $expected = '<div aria-labelledby="hello"></div>';
        $actual = Html::div()->attr("aria-labelledby hello");
        $this->assertEquals($expected, $actual->unfold());
    }
}
