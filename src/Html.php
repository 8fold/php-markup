<?php

namespace Eightfold\Markup;

// use Eightfold\HtmlComponent\Component;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\Shooped;

use Eightfold\Markup\Element;

use Eightfold\Markup\Html\Elements\HtmlElement;

class Html
{
    public static function __callStatic(string $element, array $elements)
    {
        $class = self::class($element, self::CLASSES);
        if ($class->asInteger()->is(0)->unfold()) {
            $element = Shoop::this($element)->replace(["_" => "-"]);
            return Element::fold($element, ...$elements);
        }

        if (in_array($element, ["body"])) {
            return HtmlElement::fold($element, ...$elements);
        }
        $class = $class->unfold();
        // die(var_dump(
        //     $class::fold($element, [], false, ...$elements)->attr("role document")->unfold()
        // ));
        return $class::fold($element, [], false, ...$elements);
    }

    static public function class(string $element, array $classes): Shooped
    {
        if (array_key_exists($element, $classes)) {
            return Shoop::this($classes[$element]);
        }
        return Shoop::this("");
    }

    private const CLASSES = [
          'html' => \Eightfold\Markup\Html\Elements\Root\Html::class

        , 'head'  => \Eightfold\Markup\Html\Elements\Metadata\Head::class
        , 'title' => \Eightfold\Markup\Html\Elements\Metadata\Title::class
        , 'base'  => \Eightfold\Markup\Html\Elements\Metadata\Base::class
        , 'link'  => \Eightfold\Markup\Html\Elements\Metadata\Link::class
        , 'meta'  => \Eightfold\Markup\Html\Elements\Metadata\Meta::class
        , 'style' => \Eightfold\Markup\Html\Elements\Metadata\Style::class

        , 'body'    => \Eightfold\Markup\Html\Elements\Sections\Body::class
        , 'article' => \Eightfold\Markup\Html\Elements\Sections\Article::class
        , 'section' => \Eightfold\Markup\Html\Elements\Sections\Section::class
        , 'nav'     => \Eightfold\Markup\Html\Elements\Sections\Nav::class
        , 'aside'   => \Eightfold\Markup\Html\Elements\Sections\Aside::class
        , 'address' => \Eightfold\Markup\Html\Elements\Sections\Address::class
        , 'h1'      => \Eightfold\Markup\Html\Elements\Sections\H1::class
        , 'h2'      => \Eightfold\Markup\Html\Elements\Sections\H2::class
        , 'h3'      => \Eightfold\Markup\Html\Elements\Sections\H3::class
        , 'h4'      => \Eightfold\Markup\Html\Elements\Sections\H4::class
        , 'h5'      => \Eightfold\Markup\Html\Elements\Sections\H5::class
        , 'h6'      => \Eightfold\Markup\Html\Elements\Sections\H6::class
        , 'header'  => \Eightfold\Markup\Html\Elements\Sections\Header::class
        , 'footer'  => \Eightfold\Markup\Html\Elements\Sections\Footer::class
        , 'address' => \Eightfold\Markup\Html\Elements\Sections\Address::class

        , 'p'          => \Eightfold\Markup\Html\Elements\Grouping\P::class
        , 'hr'         => \Eightfold\Markup\Html\Elements\Grouping\Hr::class
        , 'pre'        => \Eightfold\Markup\Html\Elements\Grouping\Pre::class
        , 'blockquote' => \Eightfold\Markup\Html\Elements\Grouping\Blockquote::class
        , 'ul'         => \Eightfold\Markup\Html\Elements\Grouping\Ul::class
        , 'ol'         => \Eightfold\Markup\Html\Elements\Grouping\Ol::class
        , 'li'         => \Eightfold\Markup\Html\Elements\Grouping\Li::class
        , 'dl'         => \Eightfold\Markup\Html\Elements\Grouping\Dl::class
        , 'dt'         => \Eightfold\Markup\Html\Elements\Grouping\Dt::class
        , 'dd'         => \Eightfold\Markup\Html\Elements\Grouping\Dd::class
        , 'figure'     => \Eightfold\Markup\Html\Elements\Grouping\Figure::class
        , 'figcaption' => \Eightfold\Markup\Html\Elements\Grouping\Figcaption::class
        , 'div'        => \Eightfold\Markup\Html\Elements\Grouping\Div::class
        , 'main'       => \Eightfold\Markup\Html\Elements\Grouping\Main::class

        , 'span'   => \Eightfold\Markup\Html\Elements\TextLevel\Span::class
        , 'a'      => \Eightfold\Markup\Html\Elements\TextLevel\A::class
        , 'em'     => \Eightfold\Markup\Html\Elements\TextLevel\Em::class
        , 'strong' => \Eightfold\Markup\Html\Elements\TextLevel\Strong::class
        , 'small'  => \Eightfold\Markup\Html\Elements\TextLevel\Small::class
        , 's'      => \Eightfold\Markup\Html\Elements\TextLevel\S::class
        , 'cite'   => \Eightfold\Markup\Html\Elements\TextLevel\Cite::class
        , 'q'      => \Eightfold\Markup\Html\Elements\TextLevel\Q::class
        , 'dfn'    => \Eightfold\Markup\Html\Elements\TextLevel\Dfn::class
        , 'abbr'   => \Eightfold\Markup\Html\Elements\TextLevel\Abbr::class
        , 'data'   => \Eightfold\Markup\Html\Elements\TextLevel\Data::class
        , 'time'   => \Eightfold\Markup\Html\Elements\TextLevel\Time::class
        , 'code'   => \Eightfold\Markup\Html\Elements\TextLevel\Code::class
        , 'var'    => \Eightfold\Markup\Html\Elements\TextLevel\Variable::class
        , 'samp'   => \Eightfold\Markup\Html\Elements\TextLevel\Samp::class
        , 'kbd'    => \Eightfold\Markup\Html\Elements\TextLevel\Kbd::class
        , 'sup'    => \Eightfold\Markup\Html\Elements\TextLevel\Sup::class
        , 'sub'    => \Eightfold\Markup\Html\Elements\TextLevel\Sub::class
        , 'i'      => \Eightfold\Markup\Html\Elements\TextLevel\I::class
        , 'b'      => \Eightfold\Markup\Html\Elements\TextLevel\B::class
        , 'u'      => \Eightfold\Markup\Html\Elements\TextLevel\U::class
        , 'mark'   => \Eightfold\Markup\Html\Elements\TextLevel\Mark::class
        , 'ruby'   => \Eightfold\Markup\Html\Elements\TextLevel\Ruby::class
        , 'rb'     => \Eightfold\Markup\Html\Elements\TextLevel\Rb::class
        , 'rt'     => \Eightfold\Markup\Html\Elements\TextLevel\Rt::class
        , 'rtc'    => \Eightfold\Markup\Html\Elements\TextLevel\Rtc::class
        , 'rp'     => \Eightfold\Markup\Html\Elements\TextLevel\Rp::class
        , 'bdi'    => \Eightfold\Markup\Html\Elements\TextLevel\Bdi::class
        , 'bdo'    => \Eightfold\Markup\Html\Elements\TextLevel\Bdo::class
        , 'br'     => \Eightfold\Markup\Html\Elements\TextLevel\Br::class
        , 'wbr'    => \Eightfold\Markup\Html\Elements\TextLevel\Wbr::class

        , 'ins' => \Eightfold\Markup\Html\Elements\Edits\Ins::class
        , 'del' => \Eightfold\Markup\Html\Elements\Edits\Del::class

        , 'img'    => \Eightfold\Markup\Html\Elements\Embedded\Img::class
        , 'iframe' => \Eightfold\Markup\Html\Elements\Embedded\Iframe::class
        , 'embed'  => \Eightfold\Markup\Html\Elements\Embedded\Embed::class
        , 'object' => \Eightfold\Markup\Html\Elements\Embedded\Object_::class
        , 'video'  => \Eightfold\Markup\Html\Elements\Embedded\Video::class
        , 'audio'  => \Eightfold\Markup\Html\Elements\Embedded\Audio::class
        , 'area'   => \Eightfold\Markup\Html\Elements\Embedded\Area::class
        , 'map'    => \Eightfold\Markup\Html\Elements\Embedded\Map::class
        , 'param'  => \Eightfold\Markup\Html\Elements\Embedded\Param::class
        , 'source' => \Eightfold\Markup\Html\Elements\Embedded\Source::class
        , 'track'  => \Eightfold\Markup\Html\Elements\Embedded\Track::class

        , 'table'    => \Eightfold\Markup\Html\Elements\Tabular\Table::class
        , 'caption'  => \Eightfold\Markup\Html\Elements\Tabular\Caption::class
        , 'colgroup' => \Eightfold\Markup\Html\Elements\Tabular\Colgroup::class
        , 'col'      => \Eightfold\Markup\Html\Elements\Tabular\Col::class
        , 'thead'    => \Eightfold\Markup\Html\Elements\Tabular\Thead::class
        , 'tfoot'    => \Eightfold\Markup\Html\Elements\Tabular\Tfoot::class
        , 'tbody'    => \Eightfold\Markup\Html\Elements\Tabular\Tbody::class
        , 'tr'       => \Eightfold\Markup\Html\Elements\Tabular\Tr::class
        , 'td'       => \Eightfold\Markup\Html\Elements\Tabular\Td::class
        , 'th'       => \Eightfold\Markup\Html\Elements\Tabular\Th::class

        , 'form'     => \Eightfold\Markup\Html\Elements\Forms\Form::class
        , 'label'    => \Eightfold\Markup\Html\Elements\Forms\Label::class
        , 'input'    => \Eightfold\Markup\Html\Elements\Forms\Input::class
        , 'button'   => \Eightfold\Markup\Html\Elements\Forms\Button::class
        , 'select'   => \Eightfold\Markup\Html\Elements\Forms\Select::class
        , 'datalist' => \Eightfold\Markup\Html\Elements\Forms\Datalist::class
        , 'optgroup' => \Eightfold\Markup\Html\Elements\Forms\Optgroup::class
        , 'option'   => \Eightfold\Markup\Html\Elements\Forms\Option::class
        , 'textarea' => \Eightfold\Markup\Html\Elements\Forms\Textarea::class
        , 'keygen'   => \Eightfold\Markup\Html\Elements\Forms\Keygen::class
        , 'output'   => \Eightfold\Markup\Html\Elements\Forms\Output::class
        , 'progress' => \Eightfold\Markup\Html\Elements\Forms\Progress::class
        , 'meter'    => \Eightfold\Markup\Html\Elements\Forms\Meter::class
        , 'fieldset' => \Eightfold\Markup\Html\Elements\Forms\Fieldset::class
        , 'legend'   => \Eightfold\Markup\Html\Elements\Forms\Legend::class

        , 'script'   => \Eightfold\Markup\Html\Elements\Scripting\Script::class
        , 'noscript' => \Eightfold\Markup\Html\Elements\Scripting\Noscript::class
        , 'template' => \Eightfold\Markup\Html\Elements\Scripting\Template::class
        , 'canvas'   => \Eightfold\Markup\Html\Elements\Scripting\Canvas::class
    ];
}
