<?php

namespace Eightfold\Markup\Feed\Rss;

use Carbon\Carbon;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESArray;
use Eightfold\Shoop\Helpers\Type;

use Eightfold\Markup\Element;

class Item extends Element
{
    private $title = "";
    private $link = "";
    private $description = "";
    private $otherItemContent = [];

    private $descriptionLimit = null;
    private $descriptionTail = "...";

    public function __construct(
        string $title,
        string $link,
        string $description
    )
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }

    public function guid(string $content = ""): Channel
    {
        if (strlen($content) > 0) {
            $this->otherItemContent["guid"] = $content;

        } else {
            $this->otherItemContent["guid"] = $this->link;

        }
        return $this;
    }

    public function date(
        string $date,
        string $format = "Ymd",
        string $timezone = "America/Detroit"
    )
    {
        $this->otherItemContent["pubDate"] = Carbon::createFromFormat(
            "Ymd",
            $date,
            $timezone)->hour(12)->minute(0)->second(0)->toRssString();
        return $this;
    }

    public function descriptionLimit(int $limit = 50): Item
    {
        $this->descriptionLimit = $limit;
        return $this;
    }

    private function description()
    {
        $return = Shoop::this($this->description)
            ->dropTags()
            ->divide(" ");

        if ($this->descriptionLimit !== null) {
            $return = $return->first($this->descriptionLimit);
        }

        if (Type::is($return, ESArray::class)) {
            $return = $return->join(" ");

        }
        return $return->plus($this->descriptionTail)->unfold();
    }

    public function unfold(): string
    {
        $content = Shoop::array([
            Element::title(htmlspecialchars($this->title)),
            Element::link($this->link),
            Element::description($this->description())
        ]);

        return Shoop::this(
            Element::item(...$content)->unfold()
        )->unfold();

        //             ...static::rssItemsStoreItems()->each(function($path) {
        //                 $markdown = static::uriContentStore($path)->markdown();

        //                 $item = Element::fold(
        //                         "item",
        //                             Element::fold("title", htmlspecialchars($title)),
        //                             Element::fold("link", $link),
        //                             Element::fold("guid", $link),
        //                             Element::fold("description", htmlspecialchars($description)),
        //                             $t
        //                     );
    }

    /**
     * title   The title of the item.  Venice Film Festival Tries to Quit Sinking
     * link    The URL of the item.    http://www.nytimes.com/2002/09/07/movies/07FEST.html
     * description The item synopsis.  Some of the most heated chatter at the Venice Film Festival this week was about the way that the arrival of the stars at the Palazzo del Cinema was being staged.
     * guid    A string that uniquely identifies the item. More.   <guid isPermaLink="true">http://inessential.com/2002/09/01.php#a2</guid>
     * author  Email address of the author of the item. More.  oprah@oxygen.net
     * category    Includes the item in one or more categories. More.  Simpsons Characters
     * comments    URL of a page for comments relating to the item. More.  http://www.myblog.org/cgi-local/mt/mt-comments.cgi?entry_id=290
     * enclosure   Describes a media object that is attached to the item. More.    <enclosure url="http://live.curry.com/mp3/celebritySCms.mp3" length="1069871" type="audio/mpeg"/>
     * pubDate Indicates when the item was published. More.    Sun, 19 May 2002 15:21:36 GMT
     * source  The RSS channel that the item came from. More.  <source url="http://www.quotationspage.com/data/qotd.rss">Quotes of the Day</source>
     */
}
