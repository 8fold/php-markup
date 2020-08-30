<?php

namespace Eightfold\Markup\Tests\UIKit;

use Eightfold\Markup\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;

class CompoundTest extends TestCase
{
    protected $maxMilliseconds = 5.5;

    public function testRendersWithoutContent()
    {
        $expected = "<div><div></div></div>";
        $result = UIKit::doubleWrap()->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 18.75);
    }

    public function testMarkdown()
    {
        $expected = "<p>Hello, World!</p>";
        $actual = UIKit::markdown("Hello, World!");
        $this->assertSame($expected, $actual->unfold());
    }

    public function testWebHeadDefault()
    {
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1">';
        $actual = UIKit::webHead();
        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 10.25);
    }

    public function testWebHeadFaviconStack()
    {
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180"><link rel="image/png" href="favicon-32x32.png" sizes="32x32"><link rel="image/png" href="favicon-16x16.png" sizes="16x16">';
        $actual = UIKit::webHead()->favicons(
            "favicon.ico",
            "apple-touch-icon.png",
            "favicon-32x32.png",
            "favicon-16x16.png"
        );
        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 23.25);
    }

    public function testWebHeadFaviconsStylesAndScipts()
    {
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="stylesheet" href="main.css"><script src="main.js"></script>';
        $actual = UIKit::webHead()
            ->favicons("favicon.ico")
            ->styles("main.css")
            ->scripts("main.js");
        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 24);
    }

    public function testWebHeadSocialBlock()
    {
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><meta content="website" property="og:type"><meta content="8fold PHP Markup" property="og:title"><meta content="https://8fold.dev/open-source/markup/php" property="og:url"><meta content="Get the HTML out of your PHP with this HTML generator." property="og:description"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:site" content="8foldPros">';

        $actual = UIKit::webHead()->social(
            "8fold PHP Markup",
            "https://8fold.dev/open-source/markup/php",
            "Get the HTML out of your PHP with this HTML generator."
        )->socialTwitter("8foldPros");

        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 25);
    }

    public function testAccordion()
    {
        $summaryId = "accordion";
        $summary = "Summary";
        $content = UIKit::p("The content.");

        $expected = '<h2 is="accordion"><button id="'. $summaryId .'" aria-controls="'. $summaryId .'-panel" aria-expanded="true">'. $summary .'</button></h2><div is="accordion-panel" role="region" id="'. $summaryId .'-panel" tabindex="-1" aria-hidden="false" aria-labelledby="'. $summaryId .'">'. $content->unfold() .'</div>';
        $actual = UIKit::accordion(
            $summaryId,
            $summary,
            $content
        );
        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 24);
    }
}
