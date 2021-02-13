<?php

namespace SAMUIKit\FormControls;

use SAMUIKit\Traits\FormControlsTrait;

class Select {

	use FormControlsTrait;

	static public function build($config)
	{
		return 
			Select::openContainer($config) . 
			Select::openSelect($config) . 
			Select::options($config) . 
			Select::closeSelect($config) . 
			Select::closeContainer($config);
	}

	static private function options($config)
	{
		$type = $config['type'];
		$name = $config['name'];
		$options = $config['options'];
		$disabled = ( isset($config['disabled']) ) ? $config['disabled'] : [];
		$selected = ( isset($config['selected']) ) ? $config['selected'] : [];

		$opts = '';
		if ( $type == 'dropdown' ) {
			foreach ($options as $optValue => $optLabel) {
				if ( count($selected) > 0 && in_array($optValue, $selected) ) {
					$opts .= '<option value="'. $optValue .'" selected="selected">'. $optLabel .'</option>';

				} else {
					$opts .= '<option value="'. $optValue .'">'. $optLabel .'</option>';

				}
			}

		} elseif ( $type == 'radio' || $type == 'checkbox' ) {
			foreach ($options as $optValue => $optLabel) {
				$opts .= '<li>';
				$opts .= '<input id="'. $optValue .'-'. $name .'" type="'. $type .'"';
				$opts .= ( $type == 'checkbox' ) ? ' name="'. $name .'[]"' : ' name="'. $name .'"';
				$opts .= ' value="'. $optValue .'"';
				$opts .= ( count($disabled) > 0 && in_array($optValue, $disabled) ) ? ' disabled=""' : '';
				$opts .= ( count($selected) > 0 && in_array($optValue, $selected) ) ? ' checked=""' : '';
				$opts .= '>';
				$opts .= '<label for="'. $optValue .'-'. $name .'">'. $optLabel .'</label>';
				$opts .= '</li>';

			}
		}
		return $opts;		
	}

	static private function openSelect($config)
	{
		$type = $config['type'];
		$name = $config['name'];
		$required = ( isset($config['required']) ) ? $config['required'] : false;
		$errorMessage = ( isset($config['errorMessage']) && strlen($config['errorMessage']) > 0 ) ? $config['errorMessage'] : null;

		$selectOpen = '';
		if ( $type == 'dropdown' ) {
			$selectOpen .= '<select id="'. $name .'" name="'. $name .'"';
			$selectOpen .= ( $required ) ? ' required="required"' : '';
			$selectOpen .= ( !is_null($errorMessage) ) ? ' aria-describedby="'. $name .'-input-error"' : '';
			$selectOpen .= '>';

		} elseif ( $type == 'radio' || $type == 'checkbox' ) {
			$selectOpen .= '<ul class="usa-unstyled-list';
			$selectOpen .= ( $required ) ? ' required"' : '"';
			$selectOpen .= ( !is_null($errorMessage) ) ? ' aria-describedby="'. $name .'-input-error"' : '';
			$selectOpen .= '>';

		}
		return $selectOpen;		
	}

	static private function closeSelect($config)
	{
		return ( $config['type'] == 'dropdown' ) ? '</select>' : '</ul>';
	}
}