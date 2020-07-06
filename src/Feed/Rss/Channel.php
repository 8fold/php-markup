<?php

namespace Eightfold\Markup\Feed\Rss;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Element;

use Eightfold\Markup\Feed\Rss\Item;

class Channel extends Element
{
    private $xmlVersion = "1.0";
    private $rssVersion = "2.0";

    private $title = "";
    private $link = "";
    private $description = "";
    private $otherChannelMeta = [];

    private $language = "";

    /**
     * Required: https://validator.w3.org/feed/docs/rss2.html
     *
     * title: How people refer to the service.
     *
     * link: Fully-qualified URL to the site hosting the content.
     *
     * description: Phrase or sentence describing channel.
     *
     */
    public function __construct(
        string $title,
        string $link,
        string $description,
        ...$content
    )
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->content = $content;
    }

    // TODO: Use __call() and verify against list of available members
    public function language(string $language = "en-us"): Channel
    {
        if (strlen($language) > 0) {
            $this->otherChannelMeta["language"] = $language;
        }
        return $this;
    }

    public function copyright(string $content = ""): Channel
    {
        if (strlen($content) > 0) {
            $this->otherChannelMeta["copyright"] = $content;
        }
        return $this;
    }

    public function unfold(): string
    {
        $content = Shoop::array([
            Element::title($this->title),
            Element::link($this->link),
            Element::description($this->description)
        ]);

        Shoop::dictionary($this->otherChannelMeta)->each(
            function($value, $element) use (&$content) {
                $content = $content->plus(Element::fold($element, $value));
            });

        return Shoop::string(
            Element::rss(
                Element::channel(...$content)
            )->attr("version ". $this->rssVersion)->unfold()
        )->start('<?xml version="'. $this->xmlVersion .'"?>'."\n")->unfold();

        // return Shoop::string(
            // Element::fold("rss",
                // Element::fold("channel",
                    // Element::fold("title", static::rssTitle()),
                    // Element::fold("link", static::rssLink()),
                    // Element::fold("description", static::rssDescription()),
                    // Element::fold("language", "en-us"),
                    // Element::fold("copyright", static::copyright()->unfold()),
        //             ...static::rssItemsStoreItems()->each(function($path) {
        //                 $markdown = static::uriContentStore($path)->markdown();

        //                 $title = $markdown->meta()->title;
        //                 $link = Shoop::string(static::rssLink())
        //                     ->plus($path)->unfold();

        //                 $description = ($markdown->meta()->description === null)
        //                     ? $markdown->html()
        //                     : $markdown->meta()->description();
        //                 if ($description->count()->isUnfolded(0)) {
        //                     return "";
        //                 }
                        // $description = $description->replace(static::rssDescriptionReplacements())
                        //     ->dropTags()->divide(" ")->isGreaterThan(50, function($result, $description) {
                        //     return ($result)
                        //         ? $description->first(50)->join(" ")->plus("...")
                        //         : $description->join(" ");
        //                 });

        //                 $timestamp = ($markdown->meta()->created === null)
        //                     ? ""
        //                     : Carbon::createFromFormat("Ymd", $markdown->meta()->created, "America/Detroit")
        //                         ->hour(12)
        //                         ->minute(0)
        //                         ->second(0)
        //                         ->toRssString();
        //                 $t = (strlen($timestamp) > 0)
        //                     ? Element::fold("pubDate", $timestamp)
        //                     : "";

        //                 $item = Element::fold(
        //                         "item",
                                    // Element::fold("title", htmlspecialchars($title)),
                                    // Element::fold("link", $link),
        //                             Element::fold("guid", $link),
                                    // Element::fold("description", htmlspecialchars($description)),
        //                             $t
        //                     );
        //                 return $item;
        //             })->noEmpties()
        //         )
    }

    /**
     * language    The language the channel is written in. This allows aggregators to group all Italian language sites, for example, on a single page. A list of allowable values for this element, as provided by Netscape, is here. You may also use values defined by the W3C.  en-us
     * copyright   Copyright notice for content in the channel.    Copyright 2002, Spartanburg Herald-Journal
     * managingEditor  Email address for person responsible for editorial content. geo@herald.com (George Matesky)
     * webMaster   Email address for person responsible for technical issues relating to channel.  betty@herald.com (Betty Guernsey)
     * pubDate The publication date for the content in the channel. For example, the New York Times publishes on a daily basis, the publication date flips once every 24 hours. That's when the pubDate of the channel changes. All date-times in RSS conform to the Date and Time Specification of RFC 822, with the exception that the year may be expressed with two characters or four characters (four preferred).    Sat, 07 Sep 2002 0:00:01 GMT
     * lastBuildDate   The last time the content of the channel changed.   Sat, 07 Sep 2002 9:42:31 GMT
     * category    Specify one or more categories that the channel belongs to. Follows the same rules as the <item>-level category element. More info. <category>Newspapers</category>
     * generator   A string indicating the program used to generate the channel.   MightyInHouse Content System v2.3
     * docs    A URL that points to the documentation for the format used in the RSS file. It's probably a pointer to this page. It's for people who might stumble across an RSS file on a Web server 25 years from now and wonder what it is. http://backend.userland.com/rss
     * cloud   Allows processes to register with a cloud to be notified of updates to the channel, implementing a lightweight publish-subscribe protocol for RSS feeds. More info here.    <cloud domain="rpc.sys.com" port="80" path="/RPC2" registerProcedure="pingMe" protocol="soap"/>
     * ttl ttl stands for time to live. It's a number of minutes that indicates how long a channel can be cached before refreshing from the source. More info here.    <ttl>60</ttl>
     * image   Specifies a GIF, JPEG or PNG image that can be displayed with the channel. More info here.
     * textInput   Specifies a text input box that can be displayed with the channel. More info here.
     * skipHours   A hint for aggregators telling them which hours they can skip. More info here.
     * skipDays    A hint for aggregators telling them which days they can skip. More info here.
     */
}
