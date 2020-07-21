<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;

class SocialMetaTest extends TestCase
{
    public function testFacebook()
    {
        $expected = '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description">';
        $actual = UIKit::socialMeta(
            "Hello, World!",
            "https://8fold.pro",
            "A short description. LinkedIn would like to have 100+ characters."
        );
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description"><meta content="https://8fold.pro/assets/ui/logo.svg" property="og:image"><meta content="ABCDEFGHIJKLMNOP" property="og:app_id">';
        $actual = UIKit::socialMeta(
            "Hello, World!",
            "https://8fold.pro",
            "A short description. LinkedIn would like to have 100+ characters.",
            "https://8fold.pro/assets/ui/logo.svg",
            "website",
            "ABCDEFGHIJKLMNOP"
        );
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testTwitter()
    {
        $expected = '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description"><meta content="https://8fold.pro/assets/ui/logo.svg" property="og:image"><meta content="ABCDEFGHIJKLMNOP" property="og:app_id"><meta name="twitter:card" content="summary_large_image">';
        $actual = UIKit::socialMeta(
            "Hello, World!",
            "https://8fold.pro",
            "A short description. LinkedIn would like to have 100+ characters.",
            "https://8fold.pro/assets/ui/logo.svg",
            "website",
            "ABCDEFGHIJKLMNOP"
        )->twitter();
        $this->assertEquals($expected, $actual->unfold());
    }
}
