<?php

namespace Eightfold\Html\Data;

class Elements
{
    static public function all()
    {
        return array_merge(
            self::metadata(),
            self::flow(),
            self::sectioning(),
            self::heading(),
            self::phrasing(),
            self::embedded(),
            self::interactive(),
            self::palpable(),
            self::root(),
            self::sectioningRoot(),
            self::scriptSupporting(),
            self::tabular()
        );
    }

    static public function tabular()
    {
        return array_merge(
            self::table(),
            self::caption(),
            self::colgroup(),
            self::col(),
            self::tbody(),
            self::thead(),
            self::tfoot(),
            self::tr(),
            self::td(),
            self::th()
        );
    }
    static public function metadata()
    {
        return array_merge(
            self::base(),
            self::link(),
            self::meta(),
            self::noscript(),
            self::script(),
            self::style(),
            self::template(),
            self::title()
        );
    }

    static public function flow()
    {
        // area - if descendant of a map element
        return array_merge(
            self::a(),
            self::abbr(),
            self::address(),
            self::area(),
            self::article(),
            self::aside(),
            self::audio(),
            self::b(),
            self::bdi(),
            self::bdo(),
            self::blockquote(),
            self::br(),
            self::button(),
            self::canvas(),
            self::cite(),
            self::code(),
            self::data(),
            self::datalist(),
            self::del(),
            self::dfn(),
            self::div(),
            self::dl(),
            self::em(),
            self::embed(),
            self::fieldset(),
            self::figure(),
            self::footer(),
            self::form(),
            self::h1(),
            self::h2(),
            self::h3(),
            self::h4(),
            self::h5(),
            self::h6(),
            self::header(),
            self::hr(),
            self::i(),
            self::iframe(),
            self::img(),
            self::input(),
            self::ins(),
            self::kbd(),
            self::keygen(),
            self::label(),
            self::main(),
            self::map(),
            self::mark(),
            self::math(),
            self::meter(),
            self::nav(),
            self::noscript(),
            self::object(),
            self::ol(),
            self::output(),
            self::p(),
            self::pre(),
            self::progress(),
            self::q(),
            self::ruby(),
            self::s(),
            self::samp(),
            self::script(),
            self::section(),
            self::select(),
            self::small(),
            self::span(),
            self::strong(),
            self::sub(),
            self::sub(),
            self::svg(),
            self::table(),
            self::template(),
            self::textarea(),
            self::time(),
            self::u(),
            self::ul(),
            self::var(),
            self::video(),
            self::wbr(),
            self::text()
        );

    }

    static public function sectioning()
    {
        return array_merge(
            self::article(), 
            self::aside(), 
            self::nav(), 
            self::section()
        );
    }

    static public function heading()
    {
        return array_merge(
            self::h1(), 
            self::h2(), 
            self::h3(), 
            self::h4(), 
            self::h5(), 
            self::h6()
        );
    }

    static public function phrasing()
    {
        return array_merge(
            self::a(),
            self::abbr(),
            self::area(), // (if it is a descendant of a map element)
            self::audio(),
            self::b(),
            self::bdi(),
            self::bdo(),
            self::br(),
            self::button(),
            self::canvas(),
            self::cite(),
            self::code(),
            self::data(),
            self::datalist(),
            self::del(),
            self::dfn(),
            self::em(),
            self::embed(),
            self::i(),
            self::iframe(),
            self::img(),
            self::input(),
            self::ins(),
            self::kbd(),
            self::keygen(),
            self::label(),
            self::map(),
            self::mark(),
            self::math(),
            self::meter(),
            self::noscript(),
            self::object(),
            self::output(),
            self::progress(),
            self::q(),
            self::ruby(),
            self::s(),
            self::samp(),
            self::script(),
            self::select(),
            self::small(),
            self::span(),
            self::strong(),
            self::sub(),
            self::sup(),
            self::svg(),
            self::template(),
            self::textarea(),
            self::time(),
            self::u(),
            self::var(),
            self::video(),
            self::wbr(),
            self::text()
        );
    }

    static public function embedded()
    {
        return array_merge(
            self::audio(),
            self::canvas(),
            self::embed(),
            self::iframe(),
            self::img(),
            self::main(),
            self::object(),
            self::svg(),
            self::video()
        );
    }

    static public function interactive()
    {
        return array_merge(
            self::a(),
            self::audio(), // if the controls attribute is present
            self::button(),
            self::embed(),
            self::iframe(),
            self::img(), // if the usemap attribute is present
            self::input(), // if the type attribute is not in the hiddent state
            self::keygen(),
            self::label(),
            self::object(), // if the usemap attribute is present
            self::select(),
            self::textarea(),
            self::video() // if controls attribute is present
        );
    }

    static public function palpable()
    {
        return array_merge(
            self::a(),
            self::abbr(),
            self::address(),
            self::article(),
            self::aside(),
            self::audio(),
            self::b(),
            self::bdi(),
            self::bdo(),
            self::blockquote(),
            self::button(),
            self::canvas(),
            self::cite(),
            self::code(),
            self::data(),
            self::dfn(),
            self::div(),
            self::dl(),
            self::em(),
            self::embed(),
            self::fieldset(),
            self::figure(),
            self::footer(),
            self::form(),
            self::h1(), 
            self::h2(), 
            self::h3(), 
            self::h4(), 
            self::h5(), 
            self::h6(),
            self::header(),
            self::i(),
            self::iframe(),
            self::img(),
            self::input(),
            self::ins(),
            self::kbd(),
            self::keygen(),
            self::label(),
            self::main(),
            self::map(),
            self::mark(),
            self::math(),
            self::meter(),
            self::nav(),
            self::object(),
            self::ol(),
            self::output(),
            self::p(),
            self::pre(),
            self::progress(),
            self::q(),
            self::ruby(),
            self::s(),
            self::samp(),
            self::section(),
            self::select(),
            self::small(),
            self::span(),
            self::strong(),
            self::sub(),
            self::sup(),
            self::svg(),
            self::table(),
            self::textarea(),
            self::time(),
            self::u(),
            self::ul(),
            self::var(),
            self::video(),
            self::wbr(),
            self::text()       
        );
    }

    static public function formAssociated()
    {
        return array_merge(
            self::button(),
            self::fieldset(),
            self::input(),
            self::keygen(),
            self::label(),
            self::object(),
            self::output(),
            self::select(),
            self::textarea(),
            self::img()
        );
    }

    static public function listed()
    {
        return array_merge(
            self::button(),
            self::fieldset(),
            self::input(),
            self::keygen(),
            self::object(),
            self::output(),
            self::select(),
            self::textarea()
        );
    }

    static public function submittable()
    {
        return array_merge(
            self::button(),
            self::input(),
            self::keygen(),
            self::object(),
            self::select(),
            self::textarea()
        );
    }

    static public function resettable()
    {
        return array_merge(
            self::input(),
            self::keygen(),
            self::output(),
            self::select(),
            self::textarea()
        );
    }

    static public function reassociateable()
    {
        return array_merge(
            self::button(),
            self::fieldset(),
            self::input(),
            self::keygen(),
            self::label(),
            self::object(),
            self::output(),
            self::select(),
            self::textarea()
        );
    }

    static public function labelable()
    {
        return array_merge(
            self::button(),
            self::input(), // if type is not hidden
            self::keygen(),
            self::meter(),
            self::output(),
            self::progress(),
            self::select(),
            self::textarea()
        );
    }

    static public function media()
    {
        return array_merge(self::audio(), self::video());
    }

    static public function root()
    {
        return self::html();
    }

    static public function sectioningRoot()
    {
        return self::body();
    }

    static public function scriptSupporting()
    {
        return array_merge(self::script(), self::template());
    }

    /** Begin metadata */
    static public function base(): array 
    {
        return ['base'];
    }

    static public function link(): array 
    {
        return ['link'];
    }

    static public function meta(): array 
    {
        return ['meta'];
    }

    static public function noscript(): array 
    {
        return ['noscript'];
    }

    static public function script(): array 
    {
        return ['script'];
    }

    static public function style(): array 
    {
        return ['style'];
    }

    static public function template(): array 
    {
        return ['template'];
    }

    static public function title(): array 
    {
        return ['title'];
    }  

    /** Begin flow content */
    static public function a(): array 
    {
        return ['a'];
    }
    static public function abbr(): array 
    {
        return ['abbr'];
    }
    static public function address(): array 
    {
        return ['address'];
    }

    static public function area(): array 
    {
        return ['area'];
    }

    static public function article(): array 
    {
        return ['article'];
    }

    static public function aside(): array 
    {
        return ['aside'];
    }

    static public function audio(): array 
    {
        return ['audio'];
    }

    static public function b(): array 
    {
        return ['b'];
    }

    static public function bdi(): array 
    {
        return ['bdi'];
    }

    static public function bdo(): array 
    {
        return ['bdo'];
    }

    static public function blockquote(): array 
    {
        return ['blockquote'];
    }

    static public function br(): array 
    {
        return ['br'];
    }

    static public function button(): array 
    {
        return ['button'];
    }

    static public function canvas(): array 
    {
        return ['canvas'];
    }

    static public function cite(): array 
    {
        return ['cite'];
    }

    static public function code(): array 
    {
        return ['code'];
    }

    static public function data(): array 
    {
        return ['data'];
    }
    static public function datalist(): array 
    {
        return ['datalist'];
    }

    static public function del(): array 
    {
        return ['del'];
    }
    static public function dfn(): array 
    {
        return ['dfn'];
    }

    static public function div(): array 
    {
        return ['div'];
    }

    static public function dl(): array 
    {
        return ['dl'];
    }

    static public function em(): array 
    {
        return ['em'];
    }
    static public function embed(): array 
    {
        return ['embed'];
    }

    static public function fieldset(): array 
    {
        return ['fieldset'];
    }
    
    static public function figure(): array 
    {
        return ['figure'];
    }

    static public function footer(): array 
    {
        return ['footer'];
    }

    static public function form(): array 
    {
        return ['form'];
    }

    static public function h1(): array 
    {
        return ['h1'];
    }

    static public function h2(): array 
    {
        return ['h2'];
    }

    static public function h3(): array 
    {
        return ['h3'];
    }

    static public function h4(): array 
    {
        return ['h4'];
    }

    static public function h5(): array 
    {
        return ['h5'];
    }

    static public function h6(): array 
    {
        return ['h6'];
    }

    static public function header(): array 
    {
        return ['header'];
    }

    static public function hr(): array 
    {
        return ['hr'];
    }

    static public function i(): array 
    {
        return ['i'];
    }

    static public function iframe(): array 
    {
        return ['iframe'];
    }

    static public function img(): array 
    {
        return ['img'];
    }

    static public function input(): array 
    {
        return ['input'];
    }

    static public function ins(): array 
    {
        return ['ins'];
    }

    static public function kbd(): array 
    {
        return ['kbd'];
    }

    static public function keygen(): array 
    {
        return ['keygen'];
    }

    static public function label(): array 
    {
        return ['label'];
    }

    static public function legend(): array 
    {
        return ['legend'];
    }

    static public function main(): array 
    {
        return ['main'];
    }

    static public function map(): array 
    {
        return ['map'];
    }

    static public function mark(): array 
    {
        return ['mark'];
    }

    static public function math(): array 
    {
        return ['math'];
    }

    static public function meter(): array 
    {
        return ['meter'];
    }

    static public function nav(): array 
    {
        return ['nav'];
    }

    static public function object(): array 
    {
        return ['object'];
    }

    static public function ol(): array 
    {
        return ['ol'];
    }

    static public function option(): array 
    {
        return ['option'];
    }

    static public function optgroup(): array 
    {
        return ['optgroup'];
    }

    static public function output(): array 
    {
        return ['output'];
    }

    static public function p(): array 
    {
        return ['p'];
    }

    static public function param(): array
    {
        return ['param'];
    }

    static public function pre(): array 
    {
        return ['pre'];
    }

    static public function progress(): array 
    {
        return ['progress'];
    }

    static public function q(): array 
    {
        return ['q'];
    }

    static public function ruby(): array 
    {
        return ['ruby'];
    }

    static public function rb(): array 
    {
        return ['rb'];
    }

    static public function rt(): array 
    {
        return ['rt'];
    }

    static public function rtc(): array 
    {
        return ['rtc'];
    }

    static public function rp(): array 
    {
        return ['rp'];
    }

    static public function s(): array 
    {
        return ['s'];
    }

    static public function samp(): array 
    {
        return ['samp'];
    }

    static public function section(): array 
    {
        return ['section'];
    }

    static public function select(): array 
    {
        return ['select'];
    }

    static public function small(): array 
    {
        return ['small'];
    }

    static public function span(): array 
    {
        return ['span'];
    }

    static public function strong(): array 
    {
        return ['strong'];
    }

    static public function sub(): array 
    {
        return ['sub'];
    }

    static public function sup(): array 
    {
        return ['sup'];
    }

    static public function svg(): array 
    {
        return ['svg'];
    }

    static public function table(): array 
    {
        return ['table'];
    }

    static public function textarea(): array 
    {
        return ['textarea'];
    }

    static public function time(): array 
    {
        return ['time'];
    }

    static public function u(): array 
    {
        return ['u'];
    }

    static public function ul(): array 
    {
        return ['ul'];
    }

    static public function li(): array 
    {
        return ['li'];
    }

    static public function dt(): array 
    {
        return ['dt'];
    }

    static public function dd(): array 
    {
        return ['dd'];
    }

    static public function var(): array 
    {
        return ['var'];
    }

    static public function video(): array 
    {
        return ['video'];
    }

    static public function wbr(): array 
    {
        return ['wbr'];
    }

    static public function text(): array 
    {
        return ['text'];
    }

    static public function transparent(): array 
    {
        // TODO: Transparent content models are derived from the parent element.
        return ['text'];
    }

    static public function source(): array
    {
        return ['source'];
    }

    static public function track(): array
    {
        return ['track'];
    }

    static public function figcaption(): array
    {
        return ['figcaption'];
    }

    static public function html(): array
    {
        return ['html'];
    }

    static public function head(): array
    {
        return ['head'];
    }

    static public function body(): array
    {
        return ['body'];
    }

    static public function caption(): array
    {
        return ['caption'];
    }

    static public function colgroup(): array
    {
        return ['colgroup'];
    }

    static public function col(): array
    {
        return ['col'];
    }

    static public function thead(): array
    {
        return ['thead'];
    }

    static public function tbody(): array
    {
        return ['tbody'];
    }

    static public function tfoot(): array
    {
        return ['tfoot'];
    }

    static public function tr(): array
    {
        return ['tr'];
    }

    static public function td(): array
    {
        return ['td'];
    }

    static public function th(): array
    {
        return ['th'];
    }
}
