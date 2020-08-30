<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\Interfaces\Foldable;
use Eightfold\Shoop\Traits\FoldableImp;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html;

class SocialMeta implements Foldable
{
    use FoldableImp;

    private $type = "";

    private $url = "";
    private $description = "";
    private $image = "";
    private $appId = "";

    private $meta;

    static public function processedMain($main): string
    {
        return $main;
    }

    public function __construct(
        string $title,
        string $url,
        string $description,
        string $image = "",
        string $type = "website",
        string $appId = ""
    )
    {
        $this->args = [$title, $url, $description, $image, $type, $appId];
        $this->meta = Shoop::dictionary([])->plus(
            $type, "og:type",
            $title, "og:title",
            $url, "og:url",
            $description, "og:description"
        );

        if (Shoop::string($image)->isNotEmpty) {
            $this->meta = $this->meta->plus($image, "og:image");
        }

        if (Shoop::string($appId)->isNotEmpty) {
            $this->meta = $this->meta->plus($appId, "og:app_id");
        }
    }

    public function twitter($site = "", $card = "summary_large_image")
    {
        $this->meta = $this->meta->plus($card, "twitter:card");
        Shoop::string($site)->isNotEmpty(function($result, $site) {
            if ($result->unfold()) {
                $this->meta = $this->meta->plus($site, "twitter:site");
            }
        });
        return $this;
    }

    public function unfold(): string
    {
        return $this->meta->each(function($value, $attr) {
            return Shoop::string($attr)
                ->startsWith("og:", function($result, $name) use ($value) {
                    // die(var_dump(Html::meta()->attr("property {$name}", "content {$value}")->unfold()));
                    return ($result->unfold())
                        ? Html::meta()->attr("property {$name}", "content {$value}")
                        : Html::meta()->attr("name {$name}", "content {$value}");
                });
        })->join("")->unfold();
    }
}
