<?php

namespace Eightfold\Markup\Html\Data\Attributes;

/**
 * @version 1.0.0
 *
 * Content attributes
 *
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes#Attribute_list
 */
abstract class Content
{
    /**
     * Attributes that can be applied to any element.
     *
     * @return [type] [description]
     */
    static public function globals()
    {
        return array_merge(
            self::is(), // This only applies to non-autonomous web-components
            self::id(),
            self::class(),
            self::style(),
            self::tabindex(),
            self::accesskey(),
            self::lang(),
            self::dir(),
            self::translate(),
            self::rel(),
            self::title(),
            self::contenteditable(),
            self::spellcheck(),
            self::hidden(),
            self::microdata(),
            self::rdfa()
        );
    }

    static public function microdata()
    {
        return array_merge(
            self::itemscope(),
            self::itemtype(),
            self::itemprop()
        );
    }

    static public function rdfa()
    {
        return [
            "vocab",
            "typeof",
            "property"
        ];
    }

    /**
     * Attributes that are true or false.
     *
     * These attributes do not require a value. They are false by default; therefore,
     * if the attribute is present, the value is considered `true`.
     *
     * @return [type] [description]
     */
    static public function booleans()
    {
        return array_merge(
            self::async(),
            self::autofocus(),
            self::autoplay(),
            self::checked(),
            self::controls(),
            self::default(),
            self::defer(),
            self::disabled(),
            self::download(),
            self::formnovalidate(),
            self::hidden(),
            self::ismap(),
            self::loop(),
            self::multiple(),
            self::muted(),
            self::novalidate(),
            self::readonly(),
            self::required(),
            self::reversed(),
            self::selected(),
            self::typemustmatch()
        );
    }

    static public function deprecated()
    {
        return array_merge(
            self::bgcolor(),
            self::border(),
            self::color(),
            self::manifest()
        );
    }

    static public function abbr(): array
    {
        return ['abbr'];
    }

    /**
     * accept <form>, <input> List of types the server accepts, typically a file type.
     *
     * @return [type] [description]
     */
    static public function accept(): array
    {
        return ['accept'];
    }

    /**
     * accept-charset  <form>  List of supported charsets.
     *
     * @return [type] [description]
     */
    static public function acceptCharset(): array
    {
        return ['accept-charset'];
    }

    /**
     * accesskey Global attribute Defines a keyboard shortcut to activate or add
     * focus to the element.
     *
     * @return [type] [description]
     */
    static public function accesskey(): array
    {
        return ['accesskey'];
    }

    /**
     * action <form> The URI of a program that processes the information submitted via
     * the form.
     *
     * @return [type] [description]
     */
    static public function action(): array
    {
        return ['action'];
    }

    /**
     * align <applet>, <caption>, <col>, <colgroup>,  <hr>, <iframe>, <img>, <table>,
     * <tbody>,  <td>,  <tfoot> , <th>, <thead>, <tr> Specifies the horizontal
     * alignment of the element.
     *
     * @return [type] [description]
     */
    static public function align(): array
    {
        return ['align'];
    }

    /**
     * alt <applet>, <area>, <img>, <input> Alternative text in case an image can't be
     * displayed.
     *
     * @return [type] [description]
     */
    static public function alt(): array
    {
        return ['alt'];
    }

    /**
     * async <script> Indicates that the script should be executed asynchronously.
     *
     * @return [type] [description]
     */
    static public function async(): array
    {
        return ['async'];
    }

    /**
     * autocomplete <form>, <input> Indicates whether controls in this form can by
     * default have their values automatically completed by the browser.
     *
     * @return [type] [description]
     */
    static public function autocomplete(): array
    {
        return ['autocomplete'];
    }

    /**
     * autofocus <button>, <input>, <keygen>, <select>, <textarea>   The element
     * should be automatically focused after the page loaded.
     *
     * @return [type] [description]
     */
    static public function autofocus(): array
    {
        return ['autofocus'];
    }

    /**
     * autoplay <audio>, <video> The audio or video should play as soon as possible.
     *
     * @return [type] [description]
     */
    static public function autoplay(): array
    {
        return ['autoplay'];
    }

    /**
     * autosave <input> Previous values should persist dropdowns of selectable values
     * across page loads.
     *
     * @return [type] [description]
     */
    static public function autosave(): array
    {
        return ['autosave'];
    }

    /**
     * bgcolor <body>, <col>, <colgroup>, <marquee>, <table>, <tbody>, <tfoot>, <td>,
     * <th>, <tr>
     *
     * Background color of the element.
     *
     * Note: This is a legacy attribute. Please use the CSS background-color property
     * instead.
     *
     * @return [type] [description]
     *
     * @deprecated Use CSS background-color instead.
     */
    static public function bgcolor(): array
    {
        return ['bgcolor'];
    }

    /**
     * border  <img>, <object>, <table>
     * The border width.
     *
     * Note: This is a legacy attribute. Please use the CSS border property instead.
     *
     * @return [type] [description]
     *
     * @deprecated Use CSS border instead.
     */
    static public function border(): array
    {
        return ['border'];
    }

    /**
     * buffered <audio>, <video> Contains the time range of already buffered media.
     *
     * @return [type] [description]
     */
    static public function buffered(): array
    {
        return ['buffered'];
    }

    /**
     * challenge <keygen> A challenge string that is submitted along with the public
     * key.
     *
     * @return [type] [description]
     */
    static public function challenge(): array
    {
        return ['challenge'];
    }

    /**
     * charset <meta>, <script> Declares the character encoding of the page or script.
     *
     * @return [type] [description]
     */
    static public function charset(): array
    {
        return ['charset'];
    }

    /**
     * @category Boolean
     *
     * checked <command>, <input> Indicates whether the element should be checked on
     * page load.
     *
     * @return [type] [description]
     */
    static public function checked(): array
    {
        return ['checked'];
    }

    /**
     * cite <blockquote>, <del>, <ins>, <q> Contains a URI which points to the source
     * of the quote or change.
     *
     * @return [type] [description]
     */
    static public function cite(): array
    {
        return ['cite'];
    }

    /**
     * class Global attribute Often used with CSS to style elements with common
     * properties.
     *
     * @return [type] [description]
     */
    static public function class(): array
    {
        return ['class'];
    }

    /**
     * code <applet> Specifies the URL of the applet's class file to be loaded and
     * executed.
     *
     * @return [type] [description]
     */
    static public function code(): array
    {
        return ['code'];
    }

    /**
     * codebase <applet> This attribute gives the absolute or relative URL of the
     * directory where applets' .class files referenced by the code attribute are
     * stored.
     *
     * @return [type] [description]
     */
    static public function codebase(): array
    {
        return ['codebase'];
    }

    /**
     * color <basefont>, <font>, <hr> This attribute sets the text color using either
     * a named color or a color specified in the hexadecimal #RRGGBB format.
     *
     * Note: This is a legacy attribute. Please use the CSS color property instead.
     *
     * @return [type] [description]
     *
     * @deprecated Use CSS color instead.
     *
     */
    static public function color(): array
    {
        return ['color'];
    }

    /**
     * cols <textarea> Defines the number of columns in a textarea.
     *
     * @return [type] [description]
     */
    static public function cols(): array
    {
        return ['cols'];
    }

    /**
     * colspan <td>, <th> The colspan attribute defines the number of columns a cell
     * should span.
     *
     * @return [type] [description]
     */
    static public function colspan(): array
    {
        return ['colspan'];
    }

    /**
     * content <meta> A value associated with http-equiv or name depending on the
     * context.
     *
     * @return [type] [description]
     */
    static public function content(): array
    {
        return ['content'];
    }

    /**
     * contenteditable Global attribute Indicates whether the element's content is
     * editable.
     *
     * @return [type] [description]
     */
    static public function contenteditable(): array
    {
        return ['contenteditable'];
    }

    /**
     * contextmenu Global attribute Defines the ID of a <menu> element which will
     * serve as the element's context menu.
     *
     * @return [type] [description]
     */
    static public function contextmenu(): array
    {
        return ['contextmenu'];
    }

    /**
     * controls <audio>, <video> Indicates whether the browser should show playback
     * controls to the user.
     *
     * @return [type] [description]
     */
    static public function controls(): array
    {
        return ['controls'];
    }

    /**
     * coords <area> A set of values specifying the coordinates of the hot-spot region.
     *
     * @return [type] [description]
     */
    static public function coords(): array
    {
        return ['coords'];
    }

    /**
     * crossorigin <audio>, <img>, <link>, <script>, <video> How the element handles
     * cross-origin requests
     *
     * @return [type] [description]
     */
    static public function crossorigin(): array
    {
        return ['crossorigin'];
    }

    /**
     * data <object> Specifies the URL of the resource.
     *
     * @return [type] [description]
     */
    static public function data(): array
    {
        return ['data'];
    }

    /**
     * data-* Global attribute Lets you attach custom attributes to an HTML element.
     *
     * @return [type] [description]
     */
    static public function dataAttributes(): array
    {
        return ['data-*'];
    }

    /**
     * datetime <del>, <ins>, <time> Indicates the date and time associated with the
     * element.
     *
     * @return [type] [description]
     */
    static public function datetime(): array
    {
        return ['datetime'];
    }

    /**
     * default <track> Indicates that the track should be enabled unless the user's
     * preferences indicate something different.
     *
     * @return [type] [description]
     */
    static public function default(): array
    {
        return ['default'];
    }

    /**
     * defer <script> Indicates that the script should be executed after the page has
     * been parsed.
     *
     * @return [type] [description]
     */
    static public function defer(): array
    {
        return ['defer'];
    }

    /**
     * @category Global
     *
     * dir Global attribute Defines the text direction. Allowed values are
     * ltr (Left-To-Right) or rtl (Right-To-Left)
     *
     * @return [type] [description]
     */
    static public function dir(): array
    {
        return ['dir'];
    }

    /**
     * dirname <input>, <textarea>
     *
     * @return [type] [description]
     */
    static public function dirname(): array
    {
        return ['dirname'];
    }

    /**
     * @return [type] [description]
     */
    static public function disabled(): array
    {
        return ['disabled'];
    }

    /**
     * disabled <button>, <command>, <fieldset>, <input>, <keygen>, <optgroup>,
     * <option>, <select>, <textarea>  Indicates whether the user can interact with
     * the element.
     *
     * @return [type] [description]
     */
    static public function diabled(): array
    {
        return ['disabled'];
    }

    /**
     * download <a>, <area> Indicates that the hyperlink is to be used for downloading
     * a resource.
     *
     * @return [type] [description]
     */
    static public function download(): array
    {
        return ['download'];
    }

    /**
     * @category Global
     *
     * TODO: Is boolean?
     *
     * draggable Global attribute Defines whether the element can be dragged.
     * @return [type] [description]
     */
    static public function draggable(): array
    {
        return ['draggable'];
    }

    /**
     * @category Global
     *
     * dropzone Global attribute Indicates that the element accept the dropping of
     * content on it.
     *
     * @return [type] [description]
     */
    static public function dropzone(): array
    {
        return ['dropzone'];
    }

    /**
     * enctype <form> Defines the content type of the form date when the method is
     * POST.
     *
     * @return [type] [description]
     */
    static public function enctype(): array
    {
        return ['enctype'];
    }

    /**
     * for <label>, <output> Describes elements which belongs to this one.
     *
     * @return [type] [description]
     */
    static public function for(): array
    {
        return ['for'];
    }

    /**
     * form <button>, <fieldset>, <input>, <keygen>, <label>, <meter>, <object>,
     * <output>, <progress>, <select>, <textarea> Indicates the form that is the owner
     * of the element.
     *
     * @return [type] [description]
     */
    static public function form(): array
    {
        return ['form'];
    }

    /**
     * @return [type] [description]
     */
    static public function formnovalidate(): array
    {
        return ['formnovalidate'];
    }

    /**
     * formaction <input>, <button> Indicates the action of the element, overriding
     * the action defined in the <form>.
     *
     * @return [type] [description]
     */
    static public function formaction(): array
    {
        return ['formaction'];
    }

    static public function formenctype(): array
    {
        return ['formenctype'];
    }

    static public function formmethod(): array
    {
        return ['formmethod'];
    }

    static public function formtarget(): array
    {
        return ['formtarget'];
    }

    /**
     * headers <td>, <th> IDs of the <th> elements which applies to this element.
     * @return [type] [description]
     */
    static public function headers(): array
    {
        return ['headers'];
    }

    /**
     * height  <canvas>, <embed>, <iframe>, <img>, <input>, <object>, <video>
     *
     * Specifies the height of elements listed here. For all other elements, use the
     * CSS height property.
     *
     * Note: In some instances, such as <div>, this is a legacy attribute, in which
     * case the CSS height property should be used instead.
     *
     * @return [type] [description]
     */
    static public function height(): array
    {
        return ['height'];
    }

    /**
     * @category Global
     *
     * TODO: Boolean?
     *
     * hidden Global attribute Prevents rendering of given element, while keeping
     * child elements, e.g. script elements, active.
     *
     * @return [type] [description]
     */
    static public function hidden(): array
    {
        return ['hidden'];
    }

    /**
     * high <meter> Indicates the lower bound of the upper range.
     *
     * @return [type] [description]
     */
    static public function high(): array
    {
        return ['high'];
    }

    /**
     * href <a>, <area>, <base>, <link>  The URL of a linked resource.
     *
     * @return [type] [description]
     */
    static public function href(): array
    {
        return ['href'];
    }

    /**
     * hreflang <a>, <area>, <link> Specifies the language of the linked resource.
     *
     * @return [type] [description]
     */
    static public function hreflang(): array
    {
        return ['hreflang'];
    }

    /**
     * http-equiv  <meta>
     *
     * @return [type] [description]
     */
    static public function httpEquiv(): array
    {
        return ['http-equiv'];
    }

    /**
     * icon <command> Specifies a picture which represents the command.
     *
     * @return [type] [description]
     */
    static public function icon(): array
    {
        return ['icon'];
    }

    /**
     * @category Global
     *
     * id Global attribute Often used with CSS to style a specific element. The value
     * of this attribute must be unique.
     *
     * @return [type] [description]
     */
    static public function id(): array
    {
        return ['id'];
    }

    /**
     * integrity <link>, <script>
     * Security Feature that allows browsers to verify what they fetch.
     *
     * @return [type] [description]
     */
    static public function integrity(): array
    {
        return ['integrity'];
    }

    static public function inputmode(): array
    {
        return ['inputmode'];
    }

    /**
     * @return [type] [description]
     */
    static public function is(): array
    {
        return ['is'];
    }

    /**
     * ismap <img> Indicates that the image is part of a server-side image map.
     *
     * @return [type] [description]
     */
    static public function ismap(): array
    {
        return ['ismap'];
    }

    /**
     * @category Global
     *
     * itemprop Global attribute
     * @return [type] [description]
     */
    static public function itemprop(): array
    {
        return ['itemprop'];
    }

    /**
     * @return [type] [description]
     */
    static public function itemref(): array
    {
        return ['itemref'];
    }

    static public function itemscope(): array
    {
        return ['itemscope'];
    }

    /**
     * @return [type] [description]
     */
    static public function itemtype(): array
    {
        return ['itemtype'];
    }

    /**
     * keytype <keygen> Specifies the type of key generated.
     *
     * @return [type] [description]
     */
    static public function keytype(): array
    {
        return ['keytype'];
    }

    /**
     * kind <track> Specifies the kind of text track.
     *
     * @return [type] [description]
     */
    static public function kind(): array
    {
        return ['kind'];
    }

    /**
     * label <track> Specifies a user-readable title of the text track.
     *
     * @return [type] [description]
     */
    static public function label(): array
    {
        return ['label'];
    }

    /**
     * @category Global
     *
     * lang Global attribute Defines the language used in the element.
     *
     * @return [type] [description]
     */
    static public function lang(): array
    {
        return ['lang'];
    }

    /**
     * language <script> Defines the script language used in the element.
     *
     * @return [type] [description]
     */
    static public function language(): array
    {
        return ['language'];
    }

    /**
     * list <input> Identifies a list of pre-defined options to suggest to the user.
     *
     * @return [type] [description]
     */
    static public function list(): array
    {
        return ['list'];
    }

    /**
     * loop <audio>, <bgsound>, <marquee>, <video> Indicates whether the media should
     * start playing from the start when it's finished.
     *
     * @return [type] [description]
     */
    static public function loop(): array
    {
        return ['loop'];
    }

    /**
     * low <meter> Indicates the upper bound of the lower range.
     *
     * @return [type] [description]
     */
    static public function low(): array
    {
        return ['low'];
    }

    /**
     * manifest <html> Specifies the URL of the document's cache manifest.
     *
     * @return [type] [description]
     */
    static public function manifest(): array
    {
        return ['manifest'];
    }

    /**
     * max <input>, <meter>, <progress> Indicates the maximum value allowed.
     *
     * @return [type] [description]
     */
    static public function max(): array
    {
        return ['max'];
    }

    /**
     * maxlength <input>, <textarea> Defines the maximum number of characters allowed
     * in the element.
     *
     * @return [type] [description]
     */
    static public function maxlength(): array
    {
        return ['maxlength'];
    }

    /**
     * minlength <input>, <textarea> Defines the minimum number of characters allowed
     * in the element.
     *
     * @return [type] [description]
     */
    static public function minlength(): array
    {
        return ['minlength'];
    }

    /**
     * media <a>, <area>, <link>, <source>, <style> Specifies a hint of the media for
     * which the linked resource was designed.
     *
     * @return [type] [description]
     */
    static public function media(): array
    {
        return ['media'];
    }

    static public function menu(): array
    {
        return ['menu'];
    }

    /**
     * method <form> Defines which HTTP method to use when submitting the form. Can be
     * GET (default) or POST.
     *
     * @return [type] [description]
     */
    static public function method(): array
    {
        return ['method'];
    }

    /**
     * min <input>, <meter> Indicates the minimum value allowed.
     *
     * @return [type] [description]
     */
    static public function min(): array
    {
        return ['min'];
    }

    /**
     * multiple <input>, <select> Indicates whether multiple values can be entered in
     * an input of the type email or file.
     *
     * @return [type] [description]
     */
    static public function multiple(): array
    {
        return ['multiple'];
    }

    /**
     * muted <audio>, <video> Indicates whether the audio will be initially silenced
     * on page load.
     *
     * @return [type] [description]
     */
    static public function muted(): array
    {
        return ['muted'];
    }

    /**
     * name <button>, <form>, <fieldset>, <iframe>, <input>, <keygen>, <object>,
     * <output>, <select>, <textarea>, <map>, <meta>, <param> Name of the element.
     * For example used by the server to identify the fields in form submits.
     *
     * @return [type] [description]
     */
    static public function name(): array
    {
        return ['name'];
    }

    /**
     * novalidate <form> This attribute indicates that the form shouldn't be validated
     * when submitted.
     *
     * @return [type] [description]
     */
    static public function novalidate(): array
    {
        return ['novalidate'];
    }

    /**
     * TODO: boolean?
     * open <details> Indicates whether the details will be shown on page load.
     * @return [type] [description]
     */
    static public function open(): array
    {
        return ['open'];
    }

    /**
     * optimum <meter> Indicates the optimal numeric value.
     *
     * @return [type] [description]
     */
    static public function optimum(): array
    {
        return ['optimum'];
    }

    /**
     * pattern <input> Defines a regular expression which the element's value will be
     * validated against.
     *
     * @return [type] [description]
     */
    static public function pattern(): array
    {
        return ['pattern'];
    }

    /**
     * ping <a>, <area>
     *
     * @return [type] [description]
     */
    static public function ping(): array
    {
        return ['ping'];
    }

    /**
     * placeholder <input>, <textarea> Provides a hint to the user of what can be
     * entered in the field.
     *
     * @return [type] [description]
     */
    static public function placeholder(): array
    {
        return ['placeholder'];
    }

    /**
     * poster <video> A URL indicating a poster frame to show until the user plays or
     * seeks.
     *
     * @return [type] [description]
     */
    static public function poster(): array
    {
        return ['poster'];
    }

    /**
     * preload <audio>, <video> Indicates whether the whole resource, parts of it or
     * nothing should be preloaded.
     *
     * @return [type] [description]
     */
    static public function preload(): array
    {
        return ['preload'];
    }

    /**
     * TODO: What is this?
     *
     * radiogroup <command>
     * @return [type] [description]
     */
    static public function radiogroup(): array
    {
        return ['radiogroup'];
    }

    /**
     * readonly <input>, <textarea> Indicates whether the element can be edited.
     *
     * @return [type] [description]
     */
    static public function readonly(): array
    {
        return ['readonly'];
    }

    /**
     * rel <a>, <area>, <link> Specifies the relationship of the target object to the
     * link object.
     *
     * @return [type] [description]
     */
    static public function rel(): array
    {
        return ['rel'];
    }

    /**
     * TODO: boolean?
     *
     * required <input>, <select>, <textarea> Indicates whether this element is
     * required to fill out or not.
     *
     * @return [type] [description]
     */
    static public function required(): array
    {
        return ['required'];
    }

    /**
     * TODO: boolean?
     *
     * reversed <ol> Indicates whether the list should be displayed in a descending
     * order instead of a ascending.
     *
     * @return [type] [description]
     */
    static public function reversed(): array
    {
        return ['reversed'];
    }

    /**
     * rows <textarea> Defines the number of rows in a text area.
     *
     * @return [type] [description]
     */
    static public function rows(): array
    {
        return ['rows'];
    }

    /**
     * rowspan <td>, <th> Defines the number of rows a table cell should span over.
     *
     * @return [type] [description]
     */
    static public function rowspan(): array
    {
        return ['rowspan'];
    }

    /**
     * sandbox <iframe>
     *
     * @return [type] [description]
     */
    static public function sandbox(): array
    {
        return ['sandbox'];
    }

    /**
     * scope <th>
     *
     * @return [type] [description]
     */
    static public function scope(): array
    {
        return ['scope'];
    }

    /**
     * TODO: boolean?
     *
     * scoped <style>
     * @return [type] [description]
     */
    static public function scoped(): array
    {
        return ['scoped'];
    }

    /**
     * TODO: boolean?
     *
     * seamless <iframe>
     *
     * @return [type] [description]
     */
    static public function seamless(): array
    {
        return ['seamless'];
    }

    /**
     * TODO: boolean?
     *
     * selected <option> Defines a value which will be selected on page load.
     *
     * @return [type] [description]
     */
    static public function selected(): array
    {
        return ['selected'];
    }

    /**
     * shape <a>, <area>
     *
     * @return [type] [description]
     */
    static public function shape(): array
    {
        return ['shape'];
    }

    /**
     * size <input>, <select> Defines the width of the element (in pixels). If the
     * element's type attribute is text or password then it's the number of characters.
     *
     * @return [type] [description]
     */
    static public function size(): array
    {
        return ['size'];
    }

    /**
     * sizes <link>, <img>, <source>
     *
     * @return [type] [description]
     */
    static public function sizes(): array
    {
        return ['sizes'];
    }

    /**
     * @category Global
     *
     * slot Global attribute Assigns a slot in a shadow DOM shadow tree to an element.
     *
     * @return [type] [description]
     */
    static public function slot(): array
    {
        return ['slot'];
    }

    static public function sortable(): array
    {
        return ['sortable'];
    }

    static public function sorted(): array
    {
        return ['sorted'];
    }

    /**
     * span <col>, <colgroup>
     *
     * @return [type] [description]
     */
    static public function span(): array
    {
        return ['span'];
    }

    /**
     * @category Global
     *
     * spellcheck Global attribute Indicates whether spell checking is allowed for the
     * element.
     *
     * @return [type] [description]
     */
    static public function spellcheck(): array
    {
        return ['spellcheck'];
    }

    /**
     * src <audio>, <embed>, <iframe>, <img>, <input>, <script>, <source>, <track>,
     * <video> The URL of the embeddable content.
     *
     * @return [type] [description]
     */
    static public function src(): array
    {
        return ['src'];
    }

    /**
     * srcdoc <iframe>
     *
     * @return [type] [description]
     */
    static public function srcdoc(): array
    {
        return ['srcdoc'];
    }

    /**
     * srclang <track>
     *
     * @return [type] [description]
     */
    static public function srclang(): array
    {
        return ['srclang'];
    }

    /**
     * srcset <img>
     *
     * @return [type] [description]
     */
    static public function srcset(): array
    {
        return ['srcset'];
    }

    /**
     * start <ol> Defines the first number if other than 1.
     *
     * @return [type] [description]
     */
    static public function start(): array
    {
        return ['start'];
    }

    /**
     * step <input>
     *
     * @return [type] [description]
     */
    static public function step(): array
    {
        return ['step'];
    }

    /**
     * @category Global
     *
     * style Global attribute Defines CSS styles which will override styles previously
     * set.
     *
     * @return [type] [description]
     */
    static public function style(): array
    {
        return ['style'];
    }

    /**
     * summary <table>
     *
     * @return [type] [description]
     */
    static public function summary(): array
    {
        return ['summary'];
    }

    /**
     * @category Global
     *
     * tabindex Global attribute Overrides the browser's default tab order and follows
     * the one specified instead.
     *
     * @return [type] [description]
     */
    static public function tabindex(): array
    {
        return ['tabindex'];
    }

    /**
     * @category Global
     *
     * target <a>, <area>, <base>, <form>
     *
     * @return [type] [description]
     */
    static public function target(): array
    {
        return ['target'];
    }

    /**
     * title Global attribute Text to be displayed in a tooltip when hovering over the
     * element.
     *
     * @return [type] [description]
     */
    static public function title(): array
    {
        return ['title'];
    }

    /**
     * @return [type] [description]
     */
    static public function translate(): array
    {
        return ['translate'];
    }

    /**
     * type <button>, <input>, <command>, <embed>, <object>, <script>, <source>,
     * <style>, <menu>    Defines the type of the element.
     *
     * @return [type] [description]
     */
    static public function type(): array
    {
        return ['type'];
    }

    /**
     * @return [type] [description]
     */
    static public function typemustmatch(): array
    {
        return ['typemustmatch'];
    }

    /**
     * usemap <img>, <input>, <object>
     *
     * @return [type] [description]
     */
    static public function usemap(): array
    {
        return ['usemap'];
    }

    /**
     * value <button>, <option>, <input>, <li>, <meter>, <progress>, <param> Defines a
     * default value which will be displayed in the element on page load.
     *
     * @return [type] [description]
     */
    static public function value(): array
    {
        return ['value'];
    }

    /**
     * width <canvas>, <embed>, <iframe>, <img>, <input>, <object>, <video>
     *
     * For the elements listed here, this establishes the element's width.
     *
     * Note: For all other instances, such as <div>, this is a legacy attribute, in
     * which case the CSS width property should be used instead.
     *
     * @return [type] [description]
     */
    static public function width(): array
    {
        return ['width'];
    }

    /**
     * wrap <textarea> Indicates whether the text should be wrapped.
     *
     * @return [type] [description]
     */
    static public function wrap(): array
    {
        return ['wrap'];
    }
}
