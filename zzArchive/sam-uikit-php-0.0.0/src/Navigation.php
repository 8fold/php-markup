<?php

namespace SAMUIKit;

use SAMUIKit\Navigation\ScopeNavigation;
use SAMUIKit\Navigation\Footer;
use SAMUIKit\Navigation\SideNavigation;

class Navigation {

	/**
	 * Required keys
	 * * **scopeName:** The name of the scope - display as the first link in the menu.
	 * * **homePath:** The URL for the home page of the scope.
	 * * **selectedPath:** The URL to mark as selected.
	 *
	 * Optional keys
	 * * **links:** A key-value array where the "key" is the target of the link, and the "value" is the title for the link.
	 *
	 */
	static public function scopeNavigation($config)
	{
		return ScopeNavigation::build($config);
	}

	/**
	 * Required keys
	 * * **type:** big|medium|slim
	 * * **logo:** Array - See Logo required keys below.
	 * * **name:** Name to display within footer - under logo.
	 *
	 * Optional keys
	 * * **links:** Key-value array where "key" is the target and "value" is the link text to display. Note: Only used with medium and slim types.
	 * * **number:** Contact phone number.
	 * * **email:** Contact email address.
	 * * **social:** Array - See Social optional keys below. Note: Only used with big and medium types.
	 * * **sections:** Array - See Sections required keys below. Note: Only used with big type.
	 * * **signUpTarget:** Action destination for sign up form. Note: Only used with big type.
	 *
	 * *Logo required keys*
	 * * **path:** The path to the logo image.
	 * * **alt:** The alternative text to display with the image.
	 *
	 * *Social optional keys*
	 * * **facebook|youtube|twitter|rss:** Each key has a value of the target path for the generated link.
	 *
	 * *Section required keys*
	 * * **title:** The title of the section.
	 * * **links:** See "optional keys" above.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function footer($config)
	{
		return Footer::build($config);
	}

	/**
	 * Required keys
	 * menu: See menu required and optional keys below.
	 * current: The path to compare against. Note: Do not include domain or relative paths. Ex. /path/to/check
	 *
	 * Menu required keys
	 * title: The text to display in the link.
	 * path: The destination path for the link. Note: Can be an anchor, should not be complete path. Ex. destination or #destination
	 *
	 * Menu optional keys
	 * submenu: An array of menu items. See Menu required keys. Note: Any submenus beyond the third level will be ignored.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function sideNavigation($config)
	{
		return SideNavigation::build($config);
	}
}