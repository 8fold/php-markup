<?php

namespace Eightfold\Html;

// use Eightfold\HtmlComponent\Component;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESElement;
use Eightfold\Shoop\ESString;

use Eightfold\HtmlComponent\Elements\HtmlElement;

class Html
{
    public static function __callStatic(string $element, array $args)
    {
        $class = self::class($element, self::CLASSES)->unfold();
        $args = Shoop::array($args)->start($element);
        return $class::fold($args);
    }

    static public function class(string $element, array $classes): ESString
    {
        $class = "";
        if (array_key_exists($element, $classes)) {
            return Shoop::string($classes[$element]);
        }
        trigger_error("Element {$element} not found in {static::class}");
    }

    private const CLASSES = [
          'html' => Elements\Root\Html::class

        , 'head'  => Elements\Metadata\Head::class
        , 'title' => Elements\Metadata\Title::class
        , 'base'  => Elements\Metadata\Base::class
        , 'link'  => Elements\Metadata\Link::class
        , 'meta'  => Elements\Metadata\Meta::class
        , 'style' => Elements\Metadata\Style::class

        , 'body'    => Elements\Sections\Body::class
        , 'article' => Elements\Sections\Article::class
        , 'section' => Elements\Sections\Section::class
        , 'nav'     => Elements\Sections\Nav::class
        , 'aside'   => Elements\Sections\Aside::class
        , 'address' => Elements\Sections\Address::class
        , 'h1'      => Elements\Sections\H1::class
        , 'h2'      => Elements\Sections\H2::class
        , 'h3'      => Elements\Sections\H3::class
        , 'h4'      => Elements\Sections\H4::class
        , 'h5'      => Elements\Sections\H5::class
        , 'h6'      => Elements\Sections\H6::class
        , 'header'  => Elements\Sections\Header::class
        , 'footer'  => Elements\Sections\Footer::class
        , 'address' => Elements\Sections\Address::class

        , 'p'          => Elements\Grouping\P::class
        , 'hr'         => Elements\Grouping\Hr::class
        , 'pre'        => Elements\Grouping\Pre::class
        , 'blockquote' => Elements\Grouping\Blockquote::class
        , 'ul'         => Elements\Grouping\Ul::class
        , 'ol'         => Elements\Grouping\Ol::class
        , 'li'         => Elements\Grouping\Li::class
        , 'dl'         => Elements\Grouping\Dl::class
        , 'dt'         => Elements\Grouping\Dt::class
        , 'dd'         => Elements\Grouping\Dd::class
        , 'figure'     => Elements\Grouping\Figure::class
        , 'figcaption' => Elements\Grouping\Figcaption::class
        , 'div'        => Elements\Grouping\Div::class
        , 'main'       => Elements\Grouping\Main::class

        , 'span'   => Elements\TextLevel\Span::class
        , 'a'      => Elements\TextLevel\A::class
        , 'em'     => Elements\TextLevel\Em::class
        , 'strong' => Elements\TextLevel\Strong::class
        , 'small'  => Elements\TextLevel\Small::class
        , 's'      => Elements\TextLevel\S::class
        , 'cite'   => Elements\TextLevel\Cite::class
        , 'q'      => Elements\TextLevel\Q::class
        , 'dfn'    => Elements\TextLevel\Dfn::class
        , 'abbr'   => Elements\TextLevel\Abbr::class
        , 'data'   => Elements\TextLevel\Data::class
        , 'time'   => Elements\TextLevel\Time::class
        , 'code'   => Elements\TextLevel\Code::class
        , 'var'    => Elements\TextLevel\Variable::class
        , 'samp'   => Elements\TextLevel\Samp::class
        , 'kbd'    => Elements\TextLevel\Kbd::class
        , 'sup'    => Elements\TextLevel\Sup::class
        , 'sub'    => Elements\TextLevel\Sub::class
        , 'i'      => Elements\TextLevel\I::class
        , 'b'      => Elements\TextLevel\B::class
        , 'u'      => Elements\TextLevel\U::class
        , 'mark'   => Elements\TextLevel\Mark::class
        , 'ruby'   => Elements\TextLevel\Ruby::class
        , 'rb'     => Elements\TextLevel\Rb::class
        , 'rt'     => Elements\TextLevel\Rt::class
        , 'rtc'    => Elements\TextLevel\Rtc::class
        , 'rp'     => Elements\TextLevel\Rp::class
        , 'bdi'    => Elements\TextLevel\Bdi::class
        , 'bdo'    => Elements\TextLevel\Bdo::class
        , 'br'     => Elements\TextLevel\Br::class
        , 'wbr'    => Elements\TextLevel\Wbr::class

        , 'ins' => Elements\Edits\Ins::class
        , 'del' => Elements\Edits\Del::class

        , 'img'    => Elements\Embedded\Img::class
        , 'iframe' => Elements\Embedded\Iframe::class
        , 'embed'  => Elements\Embedded\Embed::class
        , 'object' => Elements\Embedded\Object_::class
        , 'video'  => Elements\Embedded\Video::class
        , 'audio'  => Elements\Embedded\Audio::class
        , 'area'   => Elements\Embedded\Area::class
        , 'map'    => Elements\Embedded\Map::class
        , 'param'  => Elements\Embedded\Param::class
        , 'source' => Elements\Embedded\Source::class
        , 'track'  => Elements\Embedded\Track::class

        , 'table'    => Elements\Tabular\Table::class
        , 'caption'  => Elements\Tabular\Caption::class
        , 'colgroup' => Elements\Tabular\Colgroup::class
        , 'col'      => Elements\Tabular\Col::class
        , 'thead'    => Elements\Tabular\Thead::class
        , 'tfoot'    => Elements\Tabular\Tfoot::class
        , 'tbody'    => Elements\Tabular\Tbody::class
        , 'tr'       => Elements\Tabular\Tr::class
        , 'td'       => Elements\Tabular\Td::class
        , 'th'       => Elements\Tabular\Th::class

        , 'form'     => Elements\Forms\Form::class
        , 'label'    => Elements\Forms\Label::class
        , 'input'    => Elements\Forms\Input::class
        , 'button'   => Elements\Forms\Button::class
        , 'select'   => Elements\Forms\Select::class
        , 'datalist' => Elements\Forms\Datalist::class
        , 'optgroup' => Elements\Forms\Optgroup::class
        , 'option'   => Elements\Forms\Option::class
        , 'textarea' => Elements\Forms\Textarea::class
        , 'keygen'   => Elements\Forms\Keygen::class
        , 'output'   => Elements\Forms\Output::class
        , 'progress' => Elements\Forms\Progress::class
        , 'meter'    => Elements\Forms\Meter::class
        , 'fieldset' => Elements\Forms\Fieldset::class
        , 'legend'   => Elements\Forms\Legend::class

        , 'script'   => Elements\Scripting\Script::class
        , 'noscript' => Elements\Scripting\Noscript::class
        , 'template' => Elements\Scripting\Template::class
        , 'canvas'   => Elements\Scripting\Canvas::class
    ];
}
