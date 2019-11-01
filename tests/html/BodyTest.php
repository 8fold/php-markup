<?php

namespace Eightfold\Html\Tests;

use Eightfold\Html\Tests\BaseTest;

use Eightfold\Html\Html;

class BodyTest extends BaseTest
{
    public function testBodyAriaRoleCannotBeDocument()
    {
        $expected = '<body></body>';
        $result = Html::body()
            ->attr('role document');
        $this->assertEquality($expected, $result);
    }

    public function testBodyAriaRoleCanBeApplication()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('role application')->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testBodyAriaRoleCannotBeArticle()
    {
        $expected = '<body></body>';
        $result = Html::body()->attr('role article')->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testBodyAriaCanHaveAriaAttribute()
    {
        $expected = '<body aria-atomic="true"></body>';
        $result = Html::body()
            ->attr('aria-atomic true')
            ->unfold();
        $this->assertEquality($expected, $result);
    }

    public function testBodyAriaCannotHaveAriaAttribute()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()
            ->attr('aria-pressed true', "role application")
            ->unfold();
        $this->assertEquality($expected, $result);
    }
}
