<?php

namespace SAMUIKit\FormControls;

use SAMUIKit\Traits\FormControlsTrait;

class TextInput {

	use FormControlsTrait;

	static public function buildMany($inputConfigurations)
	{
		$string = '';
		foreach ($inputConfigurations as $config) {
			$string .= TextInput::build($config);
		}
		return $string;
	}
	
	static public function build($config)
	{
		return 
			TextInput::openContainer($config) . 
			TextInput::textInput($config) . 
			TextInput::closeContainer($config);
	}

	static private function textInput($config) 
	{		
		$string = '';
		if ( $config['type'] == 'textarea' ) {
			$string .= '<textarea id="'. $config['name'] .'" name="'. $config['name'] .'"';
			$string .= ( isset($config['errorMessage']) ) ? ' aria-describedby="'. $config['name'] .'-message"' : '';
			$string .= ( isset($config['required']) ) ? ' required="required"' : '';
			$string .= '>';
			$string .= ( isset($config['value']) && strlen($config['value']) > 0 ) ? $config['value'] : '';
			$string .= '</textarea>';

		} elseif ( $config['type'] == 'text' || $config['type'] == 'email' || $config['type'] == 'password' ) {
			$string .= '<input id="'. $config['name'] .'"';

			// classes
			$classes = [];
			if ( isset($config['wasSuccess']) ) {
				$classes[] = 'usa-input-success';
			}
			
			if ( isset($config['size']) && $config['size'] == 'tiny' ) {
				$classes[] = 'usa-input-tiny';

			} elseif ( isset($config['size']) && $config['size'] == 'medium' ) {
				$classes[] = 'usa-input-medium';

			}

			if ( count($classes) > 0 ) {
				$classesCollapsed = implode(' ', $classes);
				$string .= ' class="'. $classesCollapsed .'"';

			}
			$string .= ' name="'. $config['name'] .'"';
			$string .= ' type="'. $config['type'] .'"';
			$string .= ( isset($config['errorMessage']) ) ? ' aria-describedby="'. $config['name'] .'-input-error"' : '';
			$string .= ( isset($config['required']) ) ? ' required="required" aria-required="true"' : '';
			$string .= ( $config['type'] !== 'password' && isset($config['value']) && strlen($config['value']) > 0 ) ? ' value="'. $config['value'] .'"' : '';
			$string .= '>';
		
		}
		return $string;
	}

	/**
	 * 
	 * Use as instance for method chaining.
	 * 
	 */
	public function __construct($config = [])
	{
		$this->config = $config;
	}

	/*
	 *
	 * Setters optional
	 * 
	 */
	public function setValue($value = '')
	{
		return $this->updateConfig('value', $value);
	}

	public function setSize($size = null)
	{
		return $this->updateConfig('size', $size);
	}
}