<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\UIKit;

/**
 * @group Compound
 * @group 1.0.0
 */
class CompoundTest extends TestCase
{
    /**
     * @test
     */
    public function double_wrap_renders_without_content()
    {
        // For 0.2.0 was 18.75
        AssertEquals::applyWith(
            '<div><div></div></div>',
            "string",
            20.36, // 9.97, // 7.79
            578 // 573
        )->unfoldUsing(
            UIKit::doubleWrap()
        );
    }

    /**
     * @test
     */
    public function web_head()
    {
        // For 0.2.0 was 10.25
        AssertEquals::applyWith(
            '<meta name="viewport" content="width=device-width,initial-scale=1">',
            "string",
            7.78,
            549 // 547
        )->unfoldUsing(
            UIKit::webHead()
        );

        // For 0.2.0 was 23.25
        AssertEquals::applyWith(
            '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180"><link rel="image/png" href="favicon-32x32.png" sizes="32x32"><link rel="image/png" href="favicon-16x16.png" sizes="16x16">',
            "string",
            22.09, // 13.62,
            596 // 594 // 588
        )->unfoldUsing(
            UIKit::webHead()->favicons(
                "favicon.ico",
                "apple-touch-icon.png",
                "favicon-32x32.png",
                "favicon-16x16.png"
            )
        );

        // For 0.2.0 was 24ms
        AssertEquals::applyWith(
            '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="stylesheet" href="main.css"><script src="main.js"></script>',
            "string",
            13.84, // 13.31, // 10.88, // 6.17, // 5.86, // 5.14, // 4.95, // 4.47, // 3.73,
            4 // 3
        )->unfoldUsing(
            UIKit::webHead()
                ->favicons("favicon.ico")
                ->styles("main.css")
                ->scripts("main.js")
        );

        // For 0.2.0 was 25ms
        AssertEquals::applyWith(
            '<meta name="viewport" content="width=device-width,initial-scale=1"><meta content="website" property="og:type"><meta content="8fold PHP Markup" property="og:title"><meta content="https://8fold.dev/open-source/markup/php" property="og:url"><meta content="Get the HTML out of your PHP with this HTML generator." property="og:description"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:site" content="8foldPros">',
            "string",
            27.96, // 24.18, // 22.08, // 21.04, // 19.46, // 14.88, // 12.25, // 7.47,
            570
        )->unfoldUsing(
            UIKit::webHead()->social(
                "8fold PHP Markup",
                "https://8fold.dev/open-source/markup/php",
                "Get the HTML out of your PHP with this HTML generator."
            )->socialTwitter("8foldPros")
        );
    }

    /**
     * @test
     */
    public function accordion()
    {
        $summaryId = "accordion";
        $summary = "Summary";
        $content = UIKit::p("The content.");

        // For 0.2.0 was 24ms
        AssertEquals::applyWith(
            '<h2 is="accordion"><button id="'. $summaryId .'" aria-controls="'. $summaryId .'-panel" aria-expanded="true">'. $summary .'</button></h2><div is="accordion-panel" role="region" id="'. $summaryId .'-panel" tabindex="-1" aria-hidden="false" aria-labelledby="'. $summaryId .'">'. $content->unfold() .'</div>',
            "string",
            18.54, // 17.82, // 17.66, // 17.01, // 13.7, // 7.36, // 5.78
            13
        )->unfoldUsing(
            UIKit::accordion($summaryId, $summary, $content)
        );
    }
}
