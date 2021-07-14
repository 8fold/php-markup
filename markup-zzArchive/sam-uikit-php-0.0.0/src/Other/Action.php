<?php

namespace SAMUIKit\Other;

use SAMUIKit\Traits\Iconic;

use SAMUIKit\Other\Icon;
use SAMUIKit\Other\Label;

class Action {

	use Iconic;

	static public function build($config)
	{
		$type = $config['type'];
		$target = $config['target'];
		$createTitle = ( isset($config['createTitle']) ) ? $config['createTitle'] : null;
				
		if ( $type == 'create' && is_null($createTitle) ) {
			dd('Action component not configured properly - create requires title');

		}

		$string = '';
		if ( $type == 'create' ) {
			$string .= '<a href="' . $target .'">';
			$string .= Label::build(['title' => 'New '. $createTitle, 'icon' => 'create', 'moreClass' => 'usa-action-horizontal']);
			$string .= '</a>';

		} elseif ( array_key_exists($type, Action::icons()) ) {
			if ( $type == 'delete' ) {
				$string .= '<div class="usa-action-container delete">';
					
			} else {
				$string .= '<div class="usa-action-container">';

			}
			$string .= '<span><a href="'. $target .'">';
			$string .= Icon::build($type);
			$string .= ucfirst($type);
			$string .= '</a>';
			$string .= '</span>';
			$string .= '</div>';

		}
		return $string;
	}
}