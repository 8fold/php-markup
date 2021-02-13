<?php

namespace SAMUIKit\FormTemplates;

use SAMUIKit\FormControls\TextInput;
use SAMUIKit\Other\Button;

class SignInForm {
	
	static public function build($config)
	{
		$textInputs = $config['textInputs'];
		$createPath = ( isset($config['createPath']) ) ? $config['createPath'] : null;
		$forgotLinks = ( isset($config['forgotLinks']) ) ? $config['forgotLinks'] : null;
		$showPasswordOnClick = ( isset($config['showPasswordOnClick']) ) ? $config['showPasswordOnClick'] : null;

		$string = '<fieldset>';
		$string .= '<legend class="usa-drop_text">Sign in</legend>';
		if ( !is_null($createPath) ) {
			$string .= '<span>or <a href="'. $createPath .'">create an account</a></span>';	

		}

		$string .= TextInput::buildMany($textInputs);

		if ( !is_null($showPasswordOnClick) ) {
	      	$string .= '<p class="usa-form-note">';
	        $string .= '<a title="Show password" href="#" class="usa-show_password" aria-controls="password" onclick="'. $showPasswordOnClick .'(); return false">Show password</a>';
	      	$string .= '</p>';

		}

		$string .= Button::build(['title' => 'Sign in']);

		if ( isset($forgotLinks) && count($forgotLinks) > 0 ) {
			foreach ($forgotLinks as $path => $title) {
				$string .= '<p><a href="'. $path .'" title="'. $title .'">
        '. $title .'?</a></p>';

			}
		}

    	$string .= '</fieldset>';

    	return $string;
	}
}