<?php

namespace SAMUIKit;

use SAMUIKit\FormTemplates\SignInForm;
use SAMUIKit\FormTemplates\AddressForm;
use SAMUIKit\FormTemplates\NameForm;

class FormTemplates {

	/**
	 *
	 * Required keys
	 * * **textInputs:** An array of text input configurations. See Form Controls - Text Input.
	 *
	 * Optional keys
	 * * **createPath:** The URL for creating an account.
	 * * **forgotLinks:** An array of key-value pairs, where the "key" is the URL for the link, and the "value" is the text to display for the link (without punctuation).
	 * * **showPasswordOnClick:** The name of a JavaScript event handler method - placed within "onclick" attribute.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function signInForm($config)
	{
		return SignInForm::build($config);
	}

	static public function addressForm($config)
	{
		return AddressForm::build($config);
	}

	/**
	 *
	 * Required keys
	 * * **textInputs:** An array of text input configurations. See Form Controls - Text Input.
	 *
	 * Optional keys
	 * * **createPath:** The URL for creating an account.
	 * * **forgotLinks:** An array of key-value pairs, where the "key" is the URL for the link, and the "value" is the text to display for the link (without punctuation).
	 * * **showPasswordOnClick:** The name of a JavaScript event handler method - placed within "onclick" attribute.
	 * 
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	static public function nameForm($config)
	{
		return NameForm::build($config);
	}
}