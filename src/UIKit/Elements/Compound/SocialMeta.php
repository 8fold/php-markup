<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html;

class SocialMeta extends HtmlElement
{
    private $type = "";
    private $title = "";
    private $url = "";
    private $description = "";
    private $image = "";
    private $appId = "";

    private $meta;

    public function __construct(
        string $type,
        string $title,
        string $url,
        string $description,
        string $image = "",
        string $appId = ""
    )
    {
        $this->meta = Shoop::array([
            "og:type ". $type,
            "og:title ". $title,
            "og:url ". $url,
            "og:description ". $description
        ]);

        if (Shoop::string($image)->isNotEmpty) {
            $this->meta = $this->meta->plus("og:image ". $image);
        }

        if (Shoop::string($appId)->isNotEmpty) {
            $this->meta = $this->meta->plus("og:app_id ". $appId);
        }
    }

    public function twitter($card = "summary_large_image")
    {
        $this->meta = $this->meta->plus("twitter:card {$card}");
        return $this;
    }

    public function unfold(): string
    {
        return $this->meta->each(function($meta) {
            list($name, $value) = Shoop::string($meta)->divide(" ", false, 2);
            return Shoop::string($name)
                ->startsWith("og:", function($result, $name) use ($value) {
                    return ($result->unfold())
                        ? Html::meta()->attr("property {$name}", "content {$value}")
                        : Html::meta()->attr("name {$name}", "content {$value}");
                });
        })->join("");
    }
}
