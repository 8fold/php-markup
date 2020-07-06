<?php

namespace Eightfold\Markup;

use Eightfold\Markup\Feed\Rss\Channel;
use Eightfold\Markup\Feed\Rss\Item;

class Feed
{
    static public function rss(
        string $title,
        string $link,
        string $description,
        ...$content
    )
    {
        return new Channel($title, $link, $description, ...$content);
    }

    static public function rssItem(
        string $title,
        string $link,
        string $description
    )
    {
        return new Item($title, $link, $description);
    }
}
