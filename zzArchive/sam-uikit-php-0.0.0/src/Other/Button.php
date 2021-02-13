<?php

namespace SAMUIKit\Other;

use SAMUIKit\Other;

class Button {

	static public function build($config)
	{
		// dismiss is a special button type
		if ( isset($config['type']) && $config['type'] == 'dismiss' ) {
			return '<button class="usa-button-dismiss"><span class="usa-sr-only">'. $config['title'] .'</span></button>';
		}

		// otherwise, we will get a base USWDS button
		$title = $config['title'];
		$type = ( isset($config['type']) ) ? $config['type'] : null;

		$initial = '';
		switch ( $type ) {
			case 'alt':
				$initial .= '<button class="usa-button-primary-alt">';
				break;

			case 'secondary':
				$initial .= '<button class="usa-button-secondary">';
				break;

			case 'gray':
				$initial .= '<button class="usa-button-gray">';
				break;

			case 'outline':
				$initial .= '<button class="usa-button-outline" type="button">';
				break;

			case 'outline-inverse':
				$initial .= '<button class="usa-button-outline-inverse">';
				break;

			case 'big':
				$initial .= '<button class="usa-button-big" type="button">';
				break;

			case 'disabled':
				$initial .= '<button class="usa-button-disabled" disabled>';
				break;

			default:
				$initial .= '<button>';
		}

		$initial .= $title;
		$initial .= '</button>';

		if ( !isset($config['cancel']) || ( isset($config['cancel']) && strlen($config['cancel']) ) == 0 ) {
			return $initial;
		}

		return '<a class="usa-cancel" href="'. $config['cancel'] .'">cancel</a> '. $initial;
	}
}