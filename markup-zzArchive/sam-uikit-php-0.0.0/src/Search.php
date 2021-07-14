<?php

namespace SAMUIKit;

use SAMUIKit\Search\Result;
use SAMUIKit\Search\SearchBar;

class Search {

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **label:** Label text - not displayed.
	 * * **type:** big|medium|small
	 * * **action:** The path for the form to go to when submitted.
	 * * **method:** POST|GET
	 *
	 * Optional keys
	 * * **keywords:** An array of keywords to place within the search field. Will be converted to spaced-separated string.
	 * * **filters:** Array of form control Select configurations. See Form Controls Select.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function searchBar($config)
	{
		return SearchBar::build($config);
	}

	/**
	 * See Other\Resource
	 *
	 * Wrapped in a container to allow multiple results per page.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function result($config)
	{
		return Result::build($config);
	}
}