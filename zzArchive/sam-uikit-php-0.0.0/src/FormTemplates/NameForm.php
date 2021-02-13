<?php

namespace SAMUIKit\FormTemplates;

use SAMUIKit\Traits\FormControlsTrait;

use SAMUIKit\FormControls;

class NameForm {

	use FormControlsTrait;

	static public function build($config)
	{
		$config['type'] = 'nameForm';

		return 
			NameForm::openContainer($config) . 
			NameForm::nameForm($config) .
			NameForm::closeContainer($config);		
	}

	static private function nameForm($config)
	{
		$label = $config['label'];
		$name = $config['name'];

		// To remove the wrapping div
		$replace = ['<div>', '</div>'];

		$title = FormControls::textInput([
				'label' => 'Title',
				'name'  => $name .'-title',
				'type'  => 'text',
				'size'  => 'tiny'
			]);
		$form = str_replace($replace, '', $title);	

		$firstName = FormControls::textInput([
				'label' => 'First name',
				'name' => $name .'-first-name',
				'type' => 'text',
				'additional-text' => 'Required',
				'required' => true
			]);
		$form .= str_replace($replace, '', $firstName);	

		$middleName = FormControls::textInput([
				'label' => 'Middle name',
				'name' => $name .'-middle-name',
				'type' => 'text'
			]);
		$form .= str_replace($replace, '', $middleName);	

		$lastName = FormControls::textInput([
				'label' => 'Last name',
				'name' => $name .'-last-name',
				'type' => 'text',
				'additional-text' => 'Required',
				'required' => true
			]);
		$form .= str_replace($replace, '', $lastName);
		
		$suffix = FormControls::textInput([
				'label' => 'Suffix',
				'name'  => $name .'-suffix',
				'type'  => 'text',
				'size'  => 'tiny'
			]);
		$form .= str_replace($replace, '', $suffix);

		return $form;
	}
}