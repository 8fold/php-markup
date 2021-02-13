<?php

namespace SAMUIKit\Other;

use SAMUIKit\Traits\Iconic;

class Icon {

	use Iconic;

	public static function build($type)
	{
		return '<i class="fa '. Icon::iconFortype($type) .'"></i>';
	}
}