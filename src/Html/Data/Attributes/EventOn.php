<?php

namespace Eightfold\Markup\Html\Data\Attributes;

abstract class EventOn
{
    static public function globals()
    {
        return array_merge(
            self::abort(),
            self::blur(),
            self::canplaythrough(),
            self::change(),
            self::click(),
            self::cuechange(),
            self::dblclick(),
            self::durationchange(),
            self::emptied(),
            self::ended(),
            self::error(),
            self::focus(),
            self::input(),
            self::invalid(),
            self::keydown(),
            self::keypress(),
            self::keyup(),
            self::load(),
            self::loadeddata(),
            self::loadedmetadata(),
            self::loadstart(),
            self::mousedown(),
            self::mousemove(),
            self::mouseout(),
            self::mouseover(),
            self::mouseup(),
            self::mousewheel(),
            self::pause(),
            self::play(),
            self::playing(),
            self::progress(),
            self::ratechange(),
            self::reset(),
            self::resize(),
            self::scroll(),
            self::seeked(),
            self::seeking(),
            self::select(),
            self::stalled(),
            self::submit(),
            self::suspend(),
            self::timeupdate(),
            self::volumechange(),
            self::waiting()
        );
    }

    /** Begin document events */

    /**
     * onafterprint js_script Script is run after the document is printed
     *
     * @return [type] [description]
     */
    static public function afterprint(): array
    {
        return ['onafterprint'];
    }

    /**
     * onbeforeprint js_script Script is run before the document is printed
     *
     * @return [type] [description]
     */
    static public function beforeprint(): array
    {
        return ['onbeforeprint'];
    }

    /**
     * onbeforeunload js_script Script is run before the document is unloaded
     *
     * @return [type] [description]
     */
    static public function beforeunload(): array
    {
        return ['onbeforeunload'];
    }

    /**
     * onerror js_script Script is run when any error occur
     *
     * @return [type] [description]
     */
    static public function error(): array
    {
        return ['onerror'];
    }

    /**
     * onhaschange js_script Script is run when document has changed
     *
     * @return [type] [description]
     */
    static public function hashchange(): array
    {
        return ['onhashchange'];
    }

    /**
     * onload js_script Event fires after the page loading finished
     *
     * @return [type] [description]
     */
    static public function load(): array
    {
        return ['onload'];
    }

    /**
     * onmessage js_script Script is run when document goes in offline
     *
     * @return [type] [description]
     */
    static public function message(): array
    {
        return ['onmessage'];
    }

    /**
     * onoffline js_script Script is run when document comes in online
     *
     * @return [type] [description]
     */
    static public function offline(): array
    {
        return ['onoffline'];
    }

    static public function online(): array
    {
        return ['ononline'];
    }

    /**
     * onpagehide js_script Script is run when document window is hidden
     *
     * @return [type] [description]
     */
    static public function pagehide(): array
    {
        return ['onpagehide'];
    }

    /**
     * onpageshow js_script Script is run when document window become visible
     *
     * @return [type] [description]
     */
    static public function pageshow(): array
    {
        return ['onpageshow'];
    }

    /**
     * onpopstate js_script Script is run when document window history changes
     *
     * @return [type] [description]
     */
    static public function popstate(): array
    {
        return ['onpopstate'];
    }

    /**
     * onredo js_script Script is run when document perform redo
     *
     * @return [type] [description]
     */
    static public function redo(): array
    {
        return ['onredo'];
    }

    /**
     * onresize js_script Event fires when browser window is resized
     *
     * @return [type] [description]
     */
    static public function resize(): array
    {
        return ['onresize'];
    }

    /**
     * onstorage js_script Script is run when web storage area is updated
     *
     * @return [type] [description]
     */
    static public function storage(): array
    {
        return ['onstorage'];
    }

    /**
     * onundo js_script Script is run when document performs undo
     *
     * @return [type] [description]
     */
    static public function undo(): array
    {
        return ['onundo'];
    }

    /**
     * onunload js_script Event fires when browser window has been closed
     *
     * @return [type] [description]
     */
    static public function unload(): array
    {
        return ['onunload'];
    }

    /** Begin form events */

    /**
     * onblur js_script Event fire when element loses focus
     *
     * @return [type] [description]
     */
    static public function blur(): array
    {
        return ['onblur'];
    }

    /**
     * onchange js_script Event fire when element value is changed
     */
    static public function change(): array
    {
        return ['onchange'];
    }

    /**
     * oncontextmenu js_script Event fire when context menu is triggered
     */
    static public function contextmenu(): array
    {
        return ['oncontextmenu'];
    }

    /**
     * onfocus js_script Event fire when element gets focus
     */
    static public function focus(): array
    {
        return ['onfocus'];
    }

    /**
     * onformchange js_script Event fire when form changes
     */
    static public function formchange(): array
    {
        return ['onformchange'];
    }

    /**
     * onforminput js_script Event fire when form get input field
     */
    static public function forminput(): array
    {
        return ['onforminput'];
    }

    /**
     * oninput js_script Event fire when element get input field
     */
    static public function input(): array
    {
        return ['oninput'];
    }

    /**
     * oninvalid js_script Event fire when element is invalid
     */
    static public function invalid(): array
    {
        return ['oninvalid'];
    }

    /**
     * onreset js_script Event fire when clicked on form reset button
     *
     * @deprecated
     */
    static public function reset(): array
    {
        return ['onreset'];
    }

    /**
     * onselect js_script Event fire after allow to select text in an element
     */
    static public function select(): array
    {
        return ['onselect'];
    }

    /**
     * onsubmit js_script Event fire when form is submitted
     */
    static public function submit(): array
    {
        return ['onsubmit'];
    }

    /** Begin keyboard events */

    /**
     * onkeydown js_script Event fire when pressing a key
     */
    static public function keydown(): array
    {
        return ['onkeydown'];
    }

    /**
     * onkeypress js_script Event fire when press a key
     */
    static public function keypress(): array
    {
        return ['onkeypress'];
    }

    /**
     * onkeyup js_script Event fire when releases a key
     */
    static public function keyup(): array
    {
        return ['onkeyup'];
    }

    /** Begin mouse events */

    /**
     * onclick js_script Event fire when mouse click on element
     */
    static public function click(): array
    {
        return ['onclick'];
    }

    /**
     * ondblclick js_script Event fire when mouse double click on element
     */
    static public function dblclick(): array
    {
        return ['ondblclick'];
    }

    /**
     * ondrag js_script Script is run when element is dragged
     */
    static public function drag(): array
    {
        return ['ondrag'];
    }

    /**
     * ondragend js_script Script is run at end of drag operation
     */
    static public function dragend(): array
    {
        return ['ondragend'];
    }

    /**
     * ondragenter js_script Script is run when element has dragged to a valid drop
     * target
     */
    static public function dragenter(): array
    {
        return ['ondragenter'];
    }

    /**
     * ondragleave js_script Script is run when element leaves valid drop target
     */
    static public function dragleave(): array
    {
        return ['ondragleave'];
    }

    /**
     * ondragover js_script Script is run when element is dragged over on valid drop
     * target
     */
    static public function dragover(): array
    {
        return ['ondragover'];
    }

    /**
     * ondragstart js_script Script is run at start of drag operation
     */
    static public function dragstart(): array
    {
        return ['ondragstart'];
    }

    /**
     * ondrop js_script Script is run when dragged element is dropped
     */
    static public function drop(): array
    {
        return ['ondrop'];
    }

    /**
     * onmousedown js_script Event fire when mouse button is pressed down on element
     */
    static public function mousedown(): array
    {
        return ['onmousedown'];
    }

    /**
     * onmousemove js_script Event fire when mouse pointer moves over an element
     */
    static public function mousemove(): array
    {
        return ['onmousemove'];
    }

    /**
     * onmouseout js_script Event fire when mouse pointer moves out an element
     */
    static public function mouseout(): array
    {
        return ['onmouseout'];
    }

    /**
     * onmouseover js_script Event fire when mouse pointer moves over on element
     */
    static public function mouseover(): array
    {
        return ['onmouseover'];
    }

    /**
     * onmouseup js_script Event fire when mouse button is released over an element
     */
    static public function mouseup(): array
    {
        return ['onmouseup'];
    }

    /**
     * onmousewheel js_script Event fire when mouse wheel being rotated
     */
    static public function mousewheel(): array
    {
        return ['onmousewheel'];
    }

    /**
     * onscroll js_script Event fire when element scrollbar being scrolled
     */
    static public function scroll(): array
    {
        return ['onscroll'];
    }

    /** Being media events */

    /**
     * onabort js_script Script is run when element is abort
     */
    static public function abort(): array
    {
        return ['onabort'];
    }

    /**
     * oncanplay js_script Script is run when file is ready for start playing
     */
    static public function canplay(): array
    {
        return ['oncanplay'];
    }

    /**
     * oncanplaythrough js_script Script is run when file is played all way without
     * pausing for buffering
     */
    static public function canplaythrough(): array
    {
        return ['oncanplaythrough'];
    }

    /**
     * ondurationchange js_script Script is run when media length changes
     */
    static public function durationchange(): array
    {
        return ['ondurationchange'];
    }

    /**
     * onemptied js_script Script is run when something unavailable/disconnects
     */
    static public function emptied(): array
    {
        return ['onemptied'];
    }

    /**
     * onended js_script Script is run when media has reach to end position
     */
    static public function ended(): array
    {
        return ['onended'];
    }

    /**
     * onloadeddata js_script Script is run when media is loaded
     *
     * @return [type] [description]
     */
    static public function loadeddata(): array
    {
        return ['onloadeddata'];
    }

    /**
     * onloadedmetadata js_script Script is run when meta data are loaded
     */
    static public function loadedmetadata(): array
    {
        return ['onloadedmetadata'];
    }

    /**
     * onloadstart js_script Script is run when file being loaded
     */
    static public function loadstart(): array
    {
        return ['onloadstart'];
    }

    /**
     * onpause js_script Script is run when media is paused
     */
    static public function pause(): array
    {
        return ['onpause'];
    }

    /**
     * onplay js_script Script is run when media is ready to start playing
     */
    static public function play(): array
    {
        return ['onplay'];
    }

    /**
     * onplaying js_script Script is run when media is actually start for playing
     */
    static public function playing(): array
    {
        return ['onplaying'];
    }

    /**
     * onprogress js_script Script is run when browser is process of getting media data
     */
    static public function progress(): array
    {
        return ['onprogress'];
    }

    /**
     * onratechange js_script Script is run when playback rate changes
     */
    static public function ratechange(): array
    {
        return ['onratechange'];
    }

    static public function cuechange(): array
    {
        return ['oncuechange'];
    }

    /**
     * onreadystatechange js_script Script is run when ready state changes for each
     * time
     */
    static public function readystatechange(): array
    {
        return ['onreadystatechange'];
    }

    /**
     * onseeked js_script Script is run when seeking attribute value set to false,
     * that indicate seeking has ended
     */
    static public function seeked(): array
    {
        return ['onseeked'];
    }

    /**
     * onseeking js_script Script is run when seeking attribute value set to true,
     * that indicate seeking has active
     */
    static public function seeking(): array
    {
        return ['onseeking'];
    }

    /**
     * onstalled js_script Script is run when browser is unable to fetch media data
     * for any reason
     */
    static public function stalled(): array
    {
        return ['onstalled'];
    }

    /**
     * onsuspend js_script Script is run when fetching media data is stopped before it
     * is completely loaded for any reason NEW
     */
    static public function suspend(): array
    {
        return ['onsuspend'];
    }

    /**
     * ontimeupdate js_script Script is run when playing position has changed
     */
    static public function timeupdate(): array
    {
        return ['ontimeupdate'];
    }

    /**
     * onvolumechange js_script Script is run each time volume is changed
     */
    static public function volumechange(): array
    {
        return ['onvolumechange'];
    }

    /**
     * onwaiting js_script Script is run when media has paused(for buffer more data)
     */
    static public function waiting(): array
    {
        return ['onwaiting'];
    }
}
