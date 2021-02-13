<?php

namespace SAMUIKit\Traits;

use SAMUIKit\Traits\ConfigurableTrait;

trait FormControlsTrait {
	
	use ConfigurableTrait;

	static public function usesLabel($type)
	{
		return ( $type == 'dropdown' || $type == 'text' || $type == 'email' || $type == 'password' || $type == 'textarea' );
	}

	static public function usesFieldSetInputsClass($type)
	{
		return ( $type == 'checkbox' || $type == 'radio' || $type == 'dateInput' );		
	}

	static public function usesFieldSet($type)
	{
		return ( $type == 'checkbox' || $type == 'radio' || $type == 'dateInput' || $type == 'addressForm' || $type == 'nameForm' );
	}

	static private function openContainer($config)
	{
		$openContainer = ( isset($config['errorMessage']) ) ? '<div class="usa-input-error">' : '<div>';
		if ( FormControlsTrait::usesLabel($config['type']) ) {
			$openContainer .= '<label for="'. $config['name'] .'"';
			if ( isset($config['errorMessage']) ) {
				$openContainer .= ' class="usa-input-error-label"';

			} elseif ( isset($config['srOnly']) ) {
				$openContainer .= ' class="usa-sr-only"';

			}
			$openContainer .= '>';

		} elseif ( isset($config['type']) && FormControlsTrait::usesFieldSet($config['type']) ) {
			// For checkboxes and radios, we wand a feildset and legenc.
			$openContainer .= ( FormControlsTrait::usesFieldSetInputsClass($config['type']) ) ? '<fieldset class="usa-fieldset-inputs">' : '<fieldset>';

			if ( isset($config['errorMessage']) ) {
				$openContainer .= '<legend class="usa-input-error-label">';

			} elseif ( isset($config['srOnly']) ) {
				$openContainer .= '<legend class="usa-sr-only">';

			} else {
				$openContainer .= '<legend>';

			}
		}

		$openContainer .= $config['label'];
		$openContainer .= ( isset($config['additional-text']) ) ? ' <span class="usa-additional_text">'. $config['additional-text'] .'</span>' : '';
		$openContainer .= ( isset($config['type']) && FormControlsTrait::usesLabel($config['type']) ) ? '</label>' : '</legend>';
					
		// If there is an error message - always put it after the label/legend.
		// TODO: For checkboxes, $name will not resolve properly due to the way USWDS does their checkboxes (unique neames per checkbox).
		$openContainer .= ( isset($config['errorMessage']) ) ? '<span id="'. $config['name'] .'-input-error" class="usa-input-error-message" role="alert">'. $config['errorMessage'] .'</span>' : '';

		// Handle the hint
		if ( isset($config['hint']) ) {
			$openContainer .= '<span';
			$openContainer .= ' class="usa-form-hint">';
			$openContainer .= $config['hint'];
			$openContainer .= '</span>';
		}
		
		return $openContainer;
	}

	static private function closeContainer($config)
	{
		$closeContainer = ( FormControlsTrait::usesLabel($config['type']) ) ? '' : '</fieldset>';
		$closeContainer .= '</div>';
		return $closeContainer;
	}

	/*
	 * Setters required
	 */
	public function setLabel($label)
	{
		return $this->updateConfig('label', $label);
	}

	public function setType($type)
	{
		return $this->updateConfig('type', $type);
	}

	public function setName($name)
	{
		return $this->updateConfig('name', $name);
	}

	/*
	 * Setters optional
	 */
	public function setErrorMessage($errorMessage = '')
	{
		return $this->updateConfig('errorMessage', $errorMessage);
	}

	public function setWasSuccess($success = false)
	{
		return $this->updateConfig('wasSuccess', $success);
	}

	public function setRequired($required = false)
	{
		return $this->updateConfig('required', $required);
	}

	public function setSrOnly($sr_only = false)
	{
		return $this->updateConfig('srOnly', $sr_only);
	}

	/*
	 *
	 * Getters
	 * 
	 */
	public function getHtml()
	{
		return $this->build($this->config);
	}
}