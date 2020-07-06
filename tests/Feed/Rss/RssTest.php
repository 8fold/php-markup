<?php

namespace Eightfold\Markup\Tests\Feed;

use PHPUnit\Framework\TestCase;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Feed;
use Eightfold\Markup\Feed\Rss\Item;

class RssTest extends TestCase
{
    public function testFeed()
    {
        $expected = '<?xml version="1.0"?>'."\n".'<rss version="2.0"><channel><title>Title</title><link>https://8fold.dev</link><description>Description of content.</description></channel></rss>';
        $actual = Feed::rss(
            "Title",
            "https://8fold.dev",
            "Description of content."
        );
        $this->assertSame($expected, $actual->unfold());

        $expected = '<?xml version="1.0"?>'."\n".'<rss version="2.0"><channel><title>Title</title><link>https://8fold.dev</link><description>Description of content.</description><language>en-us</language></channel></rss>';
        $actual = $actual->language();
        $this->assertSame($expected, $actual->unfold());
    }

    public function testItem()
    {
        $expected = '<item><title>Title</title><link>https://8fold.dev</link><description>Hello. How are you, won\'t you tell me your name?...</description></item>';
        $actual = Feed::rssItem("Title", "https://8fold.dev", "<p>Hello. How are you, won't you tell me your name?</p>");
        $this->assertSame($expected, $actual->unfold());

        $expected = '<item><title>Title</title><link>https://8fold.dev</link><description>Hello....</description></item>';
        $actual = $actual->descriptionLimit(1);
        $this->assertSame($expected, $actual->unfold());

        $expected = '<item><title>Title</title><link>https://8fold.dev</link><description>Hello. How are you,...</description></item>';
        $actual = $actual->descriptionLimit(4);
        $this->assertSame($expected, $actual->unfold());

        $expected = '<item><title>Title</title><link>https://8fold.dev</link><description>Hello. How are you,...</description></item>';
        $actual = $actual->date(20200402);
        $this->assertSame($expected, $actual->unfold());
    }
}
