<?php

namespace SAMUIKit\FormControls;

use SAMUIKit\Traits\FormControlsTrait;

class DateInput {

	use FormControlsTrait;

	static public function build($config)
	{
		// type is optional; therefore, set manually
		$config['type'] = 'dateInput';

		return 
			DateInput::openContainer($config) . 
			DateInput::dateInput($config) .
			DateInput::closeContainer($config);
	}

	static public function dateInput($config) 
	{
		// month, day, year, required, and error message are optional
		$config['month'] = ( isset($config['month']) ) ? $config['month'] : '';
		$config['day'] = ( isset($config['day']) ) ? $config['day'] : '';
		$config['year'] = ( isset($config['year']) ) ? $config['year'] : '';
		$config['required'] = ( isset($config['required']) ) ? $config['required'] : false;
		$config['errorMessage'] = ( isset($config['errorMessage']) ) ? $config['errorMessage'] : null;

  		$string = '<div class="usa-date-of-birth">';

		$string .= DateInput::buildInput('Month', $config['name'], '0?[1-9]|1[012]', 1, 12, $config['month'], $config['required'], $config['errorMessage']);
		$string .= DateInput::buildInput('Day', $config['name'], '0?[1-9]|1[0-9]|2[0-9]|3[01]', 1, 31, $config['day'], $config['required'], $config['errorMessage']);
		$string .= DateInput::buildInput('Year', $config['name'], '[0-9]{4}', 1900, 2000, $config['year'], $config['required'], $config['errorMessage']);

		$string .= '</div>';
		
		return $string;
	}

	static private function buildInput($label, $name, $pattern, $min, $max, $value = '', $required = false, $errorMessage = null)
	{
		$field = 1;
		if ( $label == 'Day' ) {
			$field = 2;

		} elseif ( $label == 'Year' ) {
			$field = 3;

		}
		$string = '<div class="usa-datefield usa-form-group usa-form-group-'. lcfirst($label) .'">';
		$string .= '<label for="'. $name .'_'. $field .'">'. $label .'</label>';
		$string .= '<input id="'. $name .'_'. $field .'" class="usa-form-control" name="'. $name .'_'. $field .'" pattern="'. $pattern .'" type="number" min="'. $min .'" max="'. $max .'" value="'. $value .'"';
		$string .= ( $required ) ? ' required="required"' : '';
		$string .= ( !is_null($errorMessage) ) ? ' aria-describedby="'. $name .'-input-error"' : '';
		$string .= '>';
		$string .= '</div>';		

		return $string;
	}
}

?>
