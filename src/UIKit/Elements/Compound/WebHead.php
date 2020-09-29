<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\Helpers\Type;

use Eightfold\Markup\Html\HtmlElement;
use Eightfold\Markup\Html;
use Eightfold\Markup\UIKit;

class WebHead extends HtmlElement
{
    private $favicons = [];
    private $styles = [];
    private $scripts = [];
    private $social = "";

    public function __construct()
    {}

    /**
     *
     * @param  string $baseIcon   ico - base icon
     * @param  string $appleTouch No specific image type required - for apple touch devices
     * @param  string $icon32     PNG only - 32px varient (Android)
     * @param  string $icon16     PNG only - 16px varient (Android)
     *
     * @return this
     */
    public function favicons(
        string $baseIcon,
        string $appleTouch = "",
        string $icon32 = "",
        string $icon16 = ""
    )
    {
        $this->favicons = Shoop::this([
            Html::link()->attr("type image/x-icon", "rel icon", "href {$baseIcon}")
        ]);

        if (Shoop::this($appleTouch)->efToBoolean()) {
            $this->favicons = $this->favicons->plus(
                Html::link()->attr("rel apple-touch-icon", "href {$appleTouch}", "sizes 180x180")
            );
        }

        if (Shoop::this($icon32)->efToBoolean()) {
            $this->favicons = $this->favicons->plus(
                Html::link()->attr("rel image/png", "href {$icon32}", "sizes 32x32")
            );
        }

        if (Shoop::this($icon16)->efToBoolean()) {
            $this->favicons = $this->favicons->plus(
                Html::link()->attr("rel image/png", "href {$icon16}", "sizes 16x16")
            );
        }
        return $this;
    }

    public function styles(...$paths)
    {
        $this->styles = Shoop::this([]);
        foreach($paths as $path) {
            $this->styles = $this->styles->plus(
                Html::link()->attr("rel stylesheet", "href {$path}")
            );
        }
        return $this;
    }

    public function scripts(...$paths)
    {
        $this->scripts = Shoop::this([]);
        foreach($paths as $path) {
            $this->scripts = $this->scripts->plus(
                Html::script()->attr("src {$path}")
            );
        }
        return $this;
    }

    public function social(
        string $title,
        string $url,
        string $description,
        string $image = "",
        string $type = "website",
        string $appId = ""
    )
    {
        $this->social = UIKit::socialMeta(
            $title,
            $url,
            $description,
            $image,
            $type,
            $appId
        );
        return $this;
    }

    public function socialTwitter(
        string $twitterHandle = "",
        string $twitterCard = "summary_large_image"
    )
    {
        $this->social = $this->social->twitter($twitterHandle, $twitterCard);
        return $this;
    }

    public function unfold(): string
    {
        $base = Html::meta()->attr(
                "name viewport",
                "content width=device-width,initial-scale=1"
            );

        $base = Shoop::this([$base])
            ->plus($this->favicons)
            ->plus($this->social)
            ->plus($this->styles)
            ->plus($this->scripts)
            ->asArray(0, false);

        $build = Shoop::this([]);
        foreach ($base as $element) {
            $build = (is_string($element))
                ? $build->plus($element)
                : $build->plus($element->unfold());
        }

        return $build->asString()->unfold();
    }
}
