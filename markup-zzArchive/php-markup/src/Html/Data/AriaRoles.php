<?php

namespace Eightfold\Markup\Html\Data;

use Eightfold\Markup\Html\Data\Attributes\Aria;

/**
 * @version 1.0.0
 *
 * Aria roles
 */
abstract class AriaRoles
{
    static public function attributesForRole(string $role): array
    {
        return self::attributesForRoles()[$role];
    }

    static public function attributesForRoles(): array
    {
        $roles = self::all();
        $props = [
            array_merge( // alert
                Aria::globalsExpanded()),
            array_merge( // alertdialog
                Aria::globalsExpanded()),
            array_merge( // application
                Aria::globalsExpanded()),
            array_merge( // article
                Aria::globalsExpanded()),
            array_merge( // banner
                Aria::globalsExpanded()),
            array_merge( // button
                Aria::globalsExpanded(),
                Aria::pressed()),
            array_merge( // checkbox
                Aria::globals(),
                Aria::checked()), // required
            array_merge( // columnheader
                Aria::globalsExpanded()),
            array_merge( // combobox
                Aria::globalsExpanded(), // required
                Aria::autocomplete(),
                Aria::required(),
                Aria::activedescendant()),
            array_merge( // complementary
                Aria::globalsExpanded()),
            array_merge( // contentinfo
                Aria::globalsExpanded()),
            array_merge( // definition
                Aria::globalsExpanded()),
            array_merge( // dialog
                Aria::globalsExpanded()),
            array_merge( // directory
                Aria::globalsExpanded()),
            array_merge( // document
                Aria::globalsExpanded()),
            array_merge( // form
                Aria::globalsExpanded()),
            array_merge( // grid
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::multiselectable(),
                Aria::readonly(),
                Aria::activedescendant()),
            array_merge( // gridcell
                Aria::globalsExpanded(),
                Aria::readonly(),
                Aria::required(),
                Aria::selected()),
            array_merge( // group
                Aria::globalsExpanded(),
                Aria::activedescendant()),
            array_merge( // heading
                Aria::globalsExpanded(),
                Aria::level()),
            array_merge( // img
                Aria::globalsExpanded()),
            array_merge( // link
                Aria::globalsExpanded()),
            array_merge( // list
                Aria::globalsExpanded()),
            array_merge( // listbox
                Aria::globalsExpanded(),
                Aria::multiselectable(),
                Aria::required(),
                Aria::activedescendant()),
            array_merge( // listitem
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::posinset(),
                Aria::setsize()),
            array_merge( // log
                Aria::globalsExpanded()),
            array_merge( // main
                Aria::globalsExpanded()),
            array_merge( // marquee
                Aria::globalsExpanded()),
            array_merge( // math
                Aria::globalsExpanded()),
            array_merge( // menu
                Aria::globalsExpanded(),
                Aria::activedescendant()),
            array_merge( // menubar
                Aria::globalsExpanded(),
                Aria::activedescendant()),
            Aria::globals(), // menuitem
            array_merge( // menuitemcheckbox
                Aria::globals(),
                Aria::checked()), // required
            array_merge( // menuitemradio
                Aria::globals(),
                Aria::checked(), // required
                Aria::posinset(),
                Aria::selected(),
                Aria::setsize()),
            array_merge( // navigation
                Aria::globalsExpanded()),
            array_merge( // note
                Aria::globalsExpanded()),
            array_merge( // option
                Aria::globals(),
                Aria::checked(),
                Aria::posinset(),
                Aria::selected(),
                Aria::setsize()),
            Aria::globals(), // presentation
            array_merge( // progressbar
                Aria::globals(),
                Aria::valuemax(),
                Aria::valuemin(),
                Aria::valuenow(),
                Aria::valuetext()),
            array_merge( // radio
                Aria::globals(),
                Aria::checked(), // required
                Aria::posinset(),
                Aria::selected(),
                Aria::setsize()),
            array_merge( // radiogroup
                Aria::globalsExpanded(),
                Aria::required(),
                Aria::activedescendant()),
            array_merge( // region
                Aria::globalsExpanded()),
            array_merge( // row
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::selected(),
                Aria::activedescendant()),
            array_merge( // rowgroup
                Aria::globalsExpanded(),
                Aria::activedescendant()),
            array_merge( // rowheader
                Aria::globalsExpanded(),
                Aria::sort(),
                Aria::readonly(),
                Aria::required(),
                Aria::selected()),
            array_merge( // scrollbar
                Aria::globalsExpanded(),
                Aria::controls(), // required
                Aria::orientation(), // required
                Aria::valuemax(), // required
                Aria::valuemin(), // required
                Aria::valuenow()), // required
            array_merge( // search
                Aria::globalsExpanded(),
                Aria::orientation()),
            array_merge( // separator
                Aria::globals(),
                Aria::valuetext()),
            array_merge( // slider
                Aria::globals(),
                Aria::valuemax(), // required
                Aria::valuemin(), // required
                Aria::valuenow(), // required
                Aria::orientation(),
                Aria::valuetext()),
            array_merge( // spinbutton
                Aria::globals(),
                Aria::valuemax(), // required
                Aria::valuemin(), // required
                Aria::valuenow(), // required
                Aria::required(),
                Aria::valuetext()),
            array_merge( // status
                Aria::globalsExpanded()),
            array_merge( // tab
                Aria::globalsExpanded(),
                Aria::selected()),
            array_merge( // tablist
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::activedescendant()),
            array_merge( // tabpanel
                Aria::globalsExpanded()),
            array_merge( // textbox
                Aria::globals(),
                Aria::activedescendant(),
                Aria::autocomplete(),
                Aria::multiline(),
                Aria::readonly(),
                Aria::required()),
            array_merge( // timer
                Aria::globalsExpanded()),
            array_merge( // toolbar
                Aria::globalsExpanded(),
                Aria::activedescendant()),
            array_merge( // tooltip
                Aria::globalsExpanded()),
            array_merge( // tree
                Aria::globalsExpanded(),
                Aria::multiselectable(),
                Aria::required(),
                Aria::activedescendant()),
            array_merge( // treegrid
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::multiselectable(),
                Aria::readonly(),
                Aria::activedescendant(),
                Aria::required()),
            array_merge( // treeitem
                Aria::globalsExpanded(),
                Aria::level(),
                Aria::posinset(),
                Aria::setsize(),
                Aria::checked(),
                Aria::selected())
        ];
    }

    static public function any(): array
    {
        return array_merge(
            self::alert(),
            self::alterdialog(),
            self::application(),
            self::article(),
            self::banner(),
            self::button(),
            self::checkbox(),
            self::columnheader(),
            self::combobox(),
            self::complementary(),
            self::contentinfo(),
            self::definition(),
            self::dialog(),
            self::directory(),
            self::document(),
            self::form(),
            self::grid(),
            self::gridcell(),
            self::group(),
            self::heading(),
            self::img(),
            self::link(),
            self::list(),
            self::listbox(),
            self::listitem(),
            self::log(),
            self::main(),
            self::marquee(),
            self::math(),
            self::menu(),
            self::menubar(),
            self::menuitem(),
            self::menuitemcheckbox(),
            self::menuitemradio(),
            self::navigation(),
            self::note(),
            self::option(),
            self::presentation(),
            self::progressbar(),
            self::radio(),
            self::radiogroup(),
            self::region(),
            self::row(),
            self::rowgroup(),
            self::rowheader(),
            self::scrollbar(),
            self::search(),
            self::separator(),
            self::slider(),
            self::spinbutton(),
            self::status(),
            self::tab(),
            self::tablist(),
            self::tabpanel(),
            self::textbox(),
            self::timer(),
            self::toolbar(),
            self::tooltip(),
            self::tree(),
            self::treegrid(),
            self::treeitem()
        );
    }

    static public function alert(): array
    {
        return ['alert'];
    }

    static public function alterdialog(): array
    {
        return ['alertdialog'];
    }

    static public function application(): array
    {
        return ['application'];
    }

    static public function article(): array
    {
        return ['article'];
    }

    static public function banner(): array
    {
        return ['banner'];
    }

    static public function button(): array
    {
        return ['button'];
    }

    static public function checkbox(): array
    {
        return ['checkbox'];
    }

    static public function columnheader(): array
    {
        return ['columnheader'];
    }

    static public function combobox(): array
    {
        return ['combobox'];
    }

    static public function complementary(): array
    {
        return ['complementary'];
    }

    static public function contentinfo(): array
    {
        return ['contentinfo'];
    }

    static public function definition(): array
    {
        return ['definition'];
    }

    static public function dialog(): array
    {
        return ['dialog'];
    }

    static public function directory(): array
    {
        return ['directory'];
    }

    static public function document(): array
    {
        return ['document'];
    }

    static public function form(): array
    {
        return ['form'];
    }

    static public function grid(): array
    {
        return ['grid'];
    }

    static public function gridcell(): array
    {
        return ['gridcell'];
    }

    static public function group(): array
    {
        return ['group'];
    }

    static public function heading(): array
    {
        return ['heading'];
    }

    static public function img(): array
    {
        return ['img'];
    }

    static public function link(): array
    {
        return ['link'];
    }

    static public function list(): array
    {
        return ['list'];
    }

    static public function listbox(): array
    {
        return ['listbox'];
    }

    static public function listitem(): array
    {
        return ['listitem'];
    }

    static public function log(): array
    {
        return ['log'];
    }

    static public function main(): array
    {
        return ['main'];
    }

    static public function marquee(): array
    {
        return ['marquee'];
    }

    static public function math(): array
    {
        return ['math'];
    }

    static public function menu(): array
    {
        return ['menu'];
    }

    static public function menubar(): array
    {
        return ['menubar'];
    }

    static public function menuitem(): array
    {
        return ['menuitem'];
    }

    static public function menuitemcheckbox(): array
    {
        return ['menuitemcheckbox'];
    }

    static public function menuitemradio(): array
    {
        return ['menuitemradio'];
    }

    static public function navigation(): array
    {
        return ['navigation'];
    }

    static public function note(): array
    {
        return ['note'];
    }

    static public function option(): array
    {
        return ['option'];
    }

    static public function presentation(): array
    {
        return ['presentation'];
    }

    static public function progressbar(): array
    {
        return ['progressbar'];
    }

    static public function radio(): array
    {
        return ['radio'];
    }

    static public function radiogroup(): array
    {
        return ['radiogroup'];
    }

    static public function region(): array
    {
        return ['region'];
    }

    static public function row(): array
    {
        return ['row'];
    }

    static public function rowgroup(): array
    {
        return ['rowgroup'];
    }

    static public function rowheader(): array
    {
        return ['rowheader'];
    }

    static public function scrollbar(): array
    {
        return ['scrollbar'];
    }

    static public function search(): array
    {
        return ['search'];
    }

    static public function separator(): array
    {
        return ['separator'];
    }

    static public function slider(): array
    {
        return ['slider'];
    }

    static public function spinbutton(): array
    {
        return ['spinbutton'];
    }

    static public function status(): array
    {
        return ['status'];
    }

    static public function tab(): array
    {
        return ['tab'];
    }

    static public function tablist(): array
    {
        return ['tablist'];
    }

    static public function tabpanel(): array
    {
        return ['tabpanel'];
    }

    static public function textbox(): array
    {
        return ['textbox'];
    }

    static public function timer(): array
    {
        return ['timer'];
    }

    static public function toolbar(): array
    {
        return ['toolbar'];
    }

    static public function tooltip(): array
    {
        return ['tooltip'];
    }

    static public function tree(): array
    {
        return ['tree'];
    }

    static public function treegrid(): array
    {
        return ['treegrid'];
    }

    static public function treeitem(): array
    {
        return ['treeitem'];
    }
}
