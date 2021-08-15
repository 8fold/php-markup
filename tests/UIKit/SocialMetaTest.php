<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\UIKit;

/**
 * @group SocialMeta
 * @group 1.0.0
 */
class SocialMetaTest extends TestCase
{
    /**
     * @test
     */
    public function facebook()
    {
        AssertEquals::applyWith(
            '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description">',
            "string",
            19.43, // 13.62, // 11.17, // 9.8, // 9.51,
            552
        )->unfoldUsing(
            UIKit::socialMeta(
                "Hello, World!",
                "https://8fold.pro",
                "A short description. LinkedIn would like to have 100+ characters."
            )
        );

        AssertEquals::applyWith(
            '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description"><meta content="https://8fold.pro/assets/ui/logo.svg" property="og:image"><meta content="ABCDEFGHIJKLMNOP" property="og:app_id">',
            "string",
            20.31, // 18.94, // 18.23, // 16.28, // 9.33, // 8.67, // 8.61, // 6.3, // 5.93, // 5.54,
            1
        )->unfoldUsing(
            UIKit::socialMeta(
                "Hello, World!",
                "https://8fold.pro",
                "A short description. LinkedIn would like to have 100+ characters.",
                "https://8fold.pro/assets/ui/logo.svg",
                "website",
                "ABCDEFGHIJKLMNOP"
            )
        );
    }

    /**
     * @test
     */
    public function twitter()
    {
        AssertEquals::applyWith(
            '<meta content="website" property="og:type"><meta content="Hello, World!" property="og:title"><meta content="https://8fold.pro" property="og:url"><meta content="A short description. LinkedIn would like to have 100+ characters." property="og:description"><meta content="https://8fold.pro/assets/ui/logo.svg" property="og:image"><meta content="ABCDEFGHIJKLMNOP" property="og:app_id"><meta name="twitter:card" content="summary_large_image">',
            "string",
            25.4, // 23.79, // 18.99, // 10.74, // 8.14, // 7.77, // 6.73, // 6.54,
            1
        )->unfoldUsing(
            UIKit::socialMeta(
                "Hello, World!",
                "https://8fold.pro",
                "A short description. LinkedIn would like to have 100+ characters.",
                "https://8fold.pro/assets/ui/logo.svg",
                "website",
                "ABCDEFGHIJKLMNOP"
            )->twitter()
        );
    }
}
