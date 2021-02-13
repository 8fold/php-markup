<?php

namespace SAMUIKit;

use SAMUIKit\FormControls\Select;
use SAMUIKit\FormControls\SelectState;
use SAMUIKit\FormControls\SelectScope;
use SAMUIKit\FormControls\TextInput;
use SAMUIKit\FormControls\DateInput;

class FormControls {
	
	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **label:** The label of the field.
	 * * **type:** dropdown|radio|checkbox
	 * * **name:** The name of the field for POST data
	 * * **options:** An array of key-value pairs where the "key" is the option POST value and "value" is the label for the option.
	 *
	 * Optional keys
	 * * **required:** true|false (default is false) - Whether the field is required or not.
	 * * **hint:** An arbitrary non-block HTML string describing the purpose of the field.
	 * * **errorMessage:** An arbitrary non-block HTML string describing the error found.
	 * * **selected:** An array of option values to mark as selected/checked. Note: Only the checkbox type allows multiple selections.
	 * * **sr-only:** true|false (default is false) Whether the label should be for screen-readers only.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */	
	static public function select($config)
	{
		return Select::build($config);
	}

	static public function stateSelect()
	{
		return SelectState::build();
	}

	/**
	 * This is a bad idea...the view should not know anything about the system architecture.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function selectScope($config)
	{
		return SelectScope::build($config);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Note: There is an issue when display errors, and a float-fix <code>div</code> has been added.
	 *
	 * Required keys
	 * * **label:** The legend of the fieldset.
	 * * **name:** The name of the field for POST data. Note: The name will be appended with 1, 2, 3, for month, day, and year, respectively.
	 *
	 * Optional keys
	 * * **required:** true|false (default is false) - Whether the field is required or not.
	 * * **hint:** An arbitrary non-block HTML string describing the purpose of the field.
	 * * **errorMessage:** An arbitrary non-block HTML string describing the error found.
	 * * **month:** The value of the month field.
	 * * **day:** The value of the day field.
	 * * **year:** The value of the year field.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function dateInput($config)
	{
		return DateInput::build($config);
	}

	/**
	 * To allow the greatest flexibility in the definition of this element,
	 * a keyed array is passed.
	 *
	 * Required keys
	 * * **label:** The label of the field.
	 * * **type:** text|password|email|textarea
	 * * **name:** The name of the field for POST data
	 *
	 * Optional keys
	 * * **required:** true|false (default is false) - Whether the field is required or not.
	 * * **hint:** An arbitrary non-block HTML string describing the purpose of the field.
	 * * **errorMessage:** An arbitrary non-block HTML string describing the error found.
	 * * **value:** The value of the text input field. Used for pre-filling POST or PATCH|UPDATE data. Note: Setting a value on a text input with a type of password, results in an empty text input.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]        [description]
	 */
	static public function textInput($config)
	{
		return TextInput::build($config);
	}

	static public function createTextInput($config = [])
	{
		return new TextInput($config);
	}

	/**
	 * Array of text input configurations. See Text Input.
	 * 
	 * @param  [type] $textInputConfigurations [description]
	 * @return [type]                          [description]
	 */
	static public function multipleTextInputs($textInputConfigurations)
	{
		return TextInput::buildMany($textInputConfigurations);
	}
}