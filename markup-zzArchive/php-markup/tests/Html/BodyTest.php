<?php

namespace Eightfold\Markup\Tests\Html;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

class BodyTest extends TestCase
{
    public function testBodyAriaRoleCannotBeDocument()
    {
        $expected = '<body></body>';
        $result = Html::body()
            ->attr('role document');
        $this->assertEquals($expected, $result->unfold());
    }

    public function testBodyAriaRoleCanBeApplication()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('role application')->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testBodyAriaRoleCannotBeArticle()
    {
        $expected = '<body></body>';
        $result = Html::body()->attr('role article')->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testBodyAriaCanHaveAriaAttribute()
    {
        $expected = '<body aria-atomic="true"></body>';
        $result = Html::body()
            ->attr('aria-atomic true')
            ->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testBodyAriaCannotHaveAriaAttribute()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()
            ->attr('aria-pressed true', "role application")
            ->unfold();
        $this->assertEquals($expected, $result);
    }
}
