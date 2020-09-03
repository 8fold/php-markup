<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\Apply;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Markup\Html\HtmlElement;
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
        $this->meta = Shoop::this([
            "og:type"        => $type,
            "og:title"       => $title,
            "og:url"         => $url,
            "og:description" => $description
        ]);

        if (Shoop::this($image)->isEmpty()->reverse()->unfold()) {
            $this->meta = $this->meta->plus(["og:image" => $image]);
        }

        if (Shoop::this($appId)->isEmpty()->reverse()->unfold()) {
            $this->meta = $this->meta->plus(["og:app_id" => $appId]);
        }
    }

    public function twitter($site = "", $card = "summary_large_image")
    {
        $this->meta = $this->meta->plus(["twitter:card" => $card]);
        if (Shoop::this($site)->isEmpty()->reverse()->unfold()) {
             $this->meta = $this->meta->plus(["twitter:site" => $site]);
        }
        return $this;
    }

    public function unfold(): string
    {
        $build = Shoop::this([]);
        foreach ($this->meta as $attr => $value) {
            $plus = (Apply::startsWith("og:")->unfoldUsing($attr))
                 ? Html::meta()->attr("property {$attr}", "content {$value}")
                 : Html::meta()->attr("name {$attr}", "content {$value}");

            $build = $build->plus($plus);
        }

        return $build->asString()->unfold();
    }
}
