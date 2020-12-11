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
            "og:description" => (Shoop::this($description)->efIsEmpty()) ? "Description unavailable" : $description
        ]);

        if (Shoop::this($image)->isEmpty()->reversed()->unfold()) {
            $this->meta = $this->meta->append(["og:image" => $image]);
        }

        if (Shoop::this($appId)->isEmpty()->reversed()->unfold()) {
            $this->meta = $this->meta->append(["og:app_id" => $appId]);
        }
    }

    public function twitter($site = "", $card = "summary_large_image")
    {
        $this->meta = $this->meta->append(["twitter:card" => $card]);
        if (Shoop::this($site)->isEmpty()->reversed()->unfold()) {
             $this->meta = $this->meta->append(["twitter:site" => $site]);
        }
        return $this;
    }

    public function unfold(): string
    {
        return $this->meta->each(function($v, $m, &$build) {
            $build[] = (Shoop::this($m)->efStartsWith("og:"))
                ? Html::meta()->attr("property {$m}", "content {$v}")->unfold()
                : Html::meta()->attr("name {$m}", "content {$v}")->unfold();
        });
    }
}
