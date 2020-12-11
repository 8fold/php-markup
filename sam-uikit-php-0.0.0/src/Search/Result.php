<?php

namespace SAMUIKit\Search;

use SAMUIKit\Other\Resource;
use SAMUIKit\Other\Action;

class Result {

	static public function build($config)
	{
		return '<div class="usa-grid usa-search-result">'. Resource::build($config) .'</div>'; 
	}
}
