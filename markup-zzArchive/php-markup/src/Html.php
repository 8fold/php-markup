<?php

namespace Eightfold\Markup;

// use Eightfold\HtmlComponent\Component;

use Eightfold\Shoop\{
    Shoop,
    ESElement,
    ESString
};

use Eightfold\Markup\Element;

use Eightfold\Markup\Html\Elements\HtmlElement;

class Html
{
    public static function __callStatic(string $element, array $elements)
    {
        $class = self::class($element, self::CLASSES);
        if ($class->count()->is(0)->unfold()) {
            return Element::fold($element, ...$elements);
        }

        $class = $class->unfold();
        return $class::fold($element, ...$elements);
    }

    static public function class(string $element, array $classes): ESString
    {
        if (array_key_exists($element, $classes)) {
            return Shoop::string($classes[$element]);
        }
        return Shoop::string("");
    }

    private const CLASSES = [
          'html' => Html\Elements\Root\Html::class

        , 'head'  => Html\Elements\Metadata\Head::class
        , 'title' => Html\Elements\Metadata\Title::class
        , 'base'  => Html\Elements\Metadata\Base::class
        , 'link'  => Html\Elements\Metadata\Link::class
        , 'meta'  => Html\Elements\Metadata\Meta::class
        , 'style' => Html\Elements\Metadata\Style::class

        , 'body'    => Html\Elements\Sections\Body::class
        , 'article' => Html\Elements\Sections\Article::class
        , 'section' => Html\Elements\Sections\Section::class
        , 'nav'     => Html\Elements\Sections\Nav::class
        , 'aside'   => Html\Elements\Sections\Aside::class
        , 'address' => Html\Elements\Sections\Address::class
        , 'h1'      => Html\Elements\Sections\H1::class
        , 'h2'      => Html\Elements\Sections\H2::class
        , 'h3'      => Html\Elements\Sections\H3::class
        , 'h4'      => Html\Elements\Sections\H4::class
        , 'h5'      => Html\Elements\Sections\H5::class
        , 'h6'      => Html\Elements\Sections\H6::class
        , 'header'  => Html\Elements\Sections\Header::class
        , 'footer'  => Html\Elements\Sections\Footer::class
        , 'address' => Html\Elements\Sections\Address::class

        , 'p'          => Html\Elements\Grouping\P::class
        , 'hr'         => Html\Elements\Grouping\Hr::class
        , 'pre'        => Html\Elements\Grouping\Pre::class
        , 'blockquote' => Html\Elements\Grouping\Blockquote::class
        , 'ul'         => Html\Elements\Grouping\Ul::class
        , 'ol'         => Html\Elements\Grouping\Ol::class
        , 'li'         => Html\Elements\Grouping\Li::class
        , 'dl'         => Html\Elements\Grouping\Dl::class
        , 'dt'         => Html\Elements\Grouping\Dt::class
        , 'dd'         => Html\Elements\Grouping\Dd::class
        , 'figure'     => Html\Elements\Grouping\Figure::class
        , 'figcaption' => Html\Elements\Grouping\Figcaption::class
        , 'div'        => Html\Elements\Grouping\Div::class
        , 'main'       => Html\Elements\Grouping\Main::class

        , 'span'   => Html\Elements\TextLevel\Span::class
        , 'a'      => Html\Elements\TextLevel\A::class
        , 'em'     => Html\Elements\TextLevel\Em::class
        , 'strong' => Html\Elements\TextLevel\Strong::class
        , 'small'  => Html\Elements\TextLevel\Small::class
        , 's'      => Html\Elements\TextLevel\S::class
        , 'cite'   => Html\Elements\TextLevel\Cite::class
        , 'q'      => Html\Elements\TextLevel\Q::class
        , 'dfn'    => Html\Elements\TextLevel\Dfn::class
        , 'abbr'   => Html\Elements\TextLevel\Abbr::class
        , 'data'   => Html\Elements\TextLevel\Data::class
        , 'time'   => Html\Elements\TextLevel\Time::class
        , 'code'   => Html\Elements\TextLevel\Code::class
        , 'var'    => Html\Elements\TextLevel\Variable::class
        , 'samp'   => Html\Elements\TextLevel\Samp::class
        , 'kbd'    => Html\Elements\TextLevel\Kbd::class
        , 'sup'    => Html\Elements\TextLevel\Sup::class
        , 'sub'    => Html\Elements\TextLevel\Sub::class
        , 'i'      => Html\Elements\TextLevel\I::class
        , 'b'      => Html\Elements\TextLevel\B::class
        , 'u'      => Html\Elements\TextLevel\U::class
        , 'mark'   => Html\Elements\TextLevel\Mark::class
        , 'ruby'   => Html\Elements\TextLevel\Ruby::class
        , 'rb'     => Html\Elements\TextLevel\Rb::class
        , 'rt'     => Html\Elements\TextLevel\Rt::class
        , 'rtc'    => Html\Elements\TextLevel\Rtc::class
        , 'rp'     => Html\Elements\TextLevel\Rp::class
        , 'bdi'    => Html\Elements\TextLevel\Bdi::class
        , 'bdo'    => Html\Elements\TextLevel\Bdo::class
        , 'br'     => Html\Elements\TextLevel\Br::class
        , 'wbr'    => Html\Elements\TextLevel\Wbr::class

        , 'ins' => Html\Elements\Edits\Ins::class
        , 'del' => Html\Elements\Edits\Del::class

        , 'img'    => Html\Elements\Embedded\Img::class
        , 'iframe' => Html\Elements\Embedded\Iframe::class
        , 'embed'  => Html\Elements\Embedded\Embed::class
        , 'object' => Html\Elements\Embedded\Object_::class
        , 'video'  => Html\Elements\Embedded\Video::class
        , 'audio'  => Html\Elements\Embedded\Audio::class
        , 'area'   => Html\Elements\Embedded\Area::class
        , 'map'    => Html\Elements\Embedded\Map::class
        , 'param'  => Html\Elements\Embedded\Param::class
        , 'source' => Html\Elements\Embedded\Source::class
        , 'track'  => Html\Elements\Embedded\Track::class

        , 'table'    => Html\Elements\Tabular\Table::class
        , 'caption'  => Html\Elements\Tabular\Caption::class
        , 'colgroup' => Html\Elements\Tabular\Colgroup::class
        , 'col'      => Html\Elements\Tabular\Col::class
        , 'thead'    => Html\Elements\Tabular\Thead::class
        , 'tfoot'    => Html\Elements\Tabular\Tfoot::class
        , 'tbody'    => Html\Elements\Tabular\Tbody::class
        , 'tr'       => Html\Elements\Tabular\Tr::class
        , 'td'       => Html\Elements\Tabular\Td::class
        , 'th'       => Html\Elements\Tabular\Th::class

        , 'form'     => Html\Elements\Forms\Form::class
        , 'label'    => Html\Elements\Forms\Label::class
        , 'input'    => Html\Elements\Forms\Input::class
        , 'button'   => Html\Elements\Forms\Button::class
        , 'select'   => Html\Elements\Forms\Select::class
        , 'datalist' => Html\Elements\Forms\Datalist::class
        , 'optgroup' => Html\Elements\Forms\Optgroup::class
        , 'option'   => Html\Elements\Forms\Option::class
        , 'textarea' => Html\Elements\Forms\Textarea::class
        , 'keygen'   => Html\Elements\Forms\Keygen::class
        , 'output'   => Html\Elements\Forms\Output::class
        , 'progress' => Html\Elements\Forms\Progress::class
        , 'meter'    => Html\Elements\Forms\Meter::class
        , 'fieldset' => Html\Elements\Forms\Fieldset::class
        , 'legend'   => Html\Elements\Forms\Legend::class

        , 'script'   => Html\Elements\Scripting\Script::class
        , 'noscript' => Html\Elements\Scripting\Noscript::class
        , 'template' => Html\Elements\Scripting\Template::class
        , 'canvas'   => Html\Elements\Scripting\Canvas::class
    ];
}
