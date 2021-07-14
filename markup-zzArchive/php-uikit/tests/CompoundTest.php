<?php

namespace Eightfold\UIKit\Tests;

use Eightfold\UIKit\Tests\BaseTest;

use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\FormControls\InputText;

class CompoundTest extends BaseTest
{
    public function testHeadBase()
    {
        // $expected = '<head><title>Hello, World!</title><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"></head>';
        // $result = UIKit::head(
        //     'Hello, World!'
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testAlertBase()
    {
        // $expected = '<div class="ef-alert ef-alert-info single-centered"><div class="ef-alert-body"><h3 class="ef-alert-heading">Hello, World!</h3><p>Just wanted to say, &quot;Hello!&quot;</p>'."\n".'</div></div>';
        // $result = UIKit::alert(
        //     'Hello, World!',
        //     'Just wanted to say, "Hello!"'
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testPrimaryNavigation()
    {
        // $expected = '<a class="ef-skipnav" href="#main-content">Skip to main content</a><nav is="ef-primary-nav"><ul class="collapsed"><li><button is="ef-button" class="collapsable"><span>Show menu</span></button></li><li><a href="/somewhere">Over the rainbow</a></li></ul></nav>';
        // $result = UIKit::primary_nav(
        //     ['Over the rainbow', '/somewhere']
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testSecondaryNavigation()
    {
        // $expected = '<nav is="ef-secondary-nav"><ul><li><a href="/somewhere">Over the rainbow</a></li></ul></nav>';
        // $result = UIKit::secondary_nav(
        //     ['Over the rainbow', '/somewhere']
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testSideNavigation()
    {
        // $expected = '<aside is="ef-side-nav"><ul><li><a href="/somewhere">Over the rainbow</a></li></ul></aside>';
        // $result = UIKit::side_nav(
        //     ['Over the rainbow', '/somewhere']
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testFooterBase()
    {
        // $expected = '<footer><p>© 2000&ndash;'. date('Y') .' 8fold. All rights reserved.</p></footer>';
        // $result = UIKit::footer('8fold', 2000)->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testFooterLinks()
    {
        // $expected = '<footer><nav><ul><li><a href="about">About</a></li><li><a href="terms">Terms</a></li></ul></nav><p>© 2014&ndash;2017 8fold. All rights reserved.</p><script src="/js/8fold.js"></script></footer>';
        // $result = UIKit::footer(
        //       '8fold'
        //     , 2014
        // )->links(
        //     ['About', 'about'],
        //     ['Terms', 'terms']
        // )->scripts('/js/8fold.js')
        // ->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testHeaderBase()
    {
        // $expected = '<header><a class="ef-skipnav" href="#main-content">Skip to main content</a><nav is="ef-primary-nav"><ul class="collapsed"><li><button is="ef-button" class="collapsable"><span>Show menu</span></button></li><li><a href="/somewhere">Primary navigation</a></li></ul></nav><nav is="ef-secondary-nav"><ul><li><a href="/somewhere">Secondary navigation</a></li></ul></nav></header>';
        // $result = UIKit::header()
        //     ->primaryNav(
        //         ['Primary navigation', '/somewhere']
        //     )->secondaryNav(
        //         ['Secondary navigation', '/somewhere']
        //     )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testActionContainerBase()
    {
        // $expected = '<form is="ef-action-container" action="/somewhere" method="post"><div></div><div></div></form>';
        // $result = UIKit::action_container(
        //       'post /somewhere'
        //     , Html::div()
        //     , Html::div()
        // )->compile();
        // $this->assertEquals($expected, $result);
    }
}
