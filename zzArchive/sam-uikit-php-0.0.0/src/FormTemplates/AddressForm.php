<?php

namespace SAMUIKit\FormTemplates;

use SAMUIKit\FormControls;

use SAMUIKit\Traits\FormControlsTrait;

class AddressForm {

	use FormControlsTrait;

	static public function build($config)
	{
		$config['type'] = 'addressForm';
		
		return 
			AddressForm::openContainer($config) . 
			AddressForm::addressForm($config) .
			AddressForm::closeContainer($config);		
	}

	static private function addressForm($config)
	{
		$name = $config['name'];
		$form = FormControls::multipleTextInputs([
				[
					'label' => 'Street address 1',
					'type' => 'text',
					'name' => $name .'-1'
				],
				[
					'label' => 'Street address 2',
					'type' => 'text',
					'name' => $name .'-2',
					'additional-text' => 'Optional'
				]
			]);
		
		// remove input container divs because the whole
		// form will be wrapped in the error container
		$replace = ['<div>', '</div>'];
		$form = str_replace($replace, '', $form);

		// open city state
		$form .= '<div>';

		// city field
		$form .= '<div class="usa-input-grid usa-input-grid-medium">';
		$input = FormControls::textInput([
				'label' => 'City',
				'type' => 'text',
				'name' => 'city'
			]);
		$form .= str_replace($replace, '', $input);
		$form .= '</div>';

		// state dropdown
		$form .= '<div class="usa-input-grid usa-input-grid-small">';
		$form .= str_replace($replace, '', FormControls::stateSelect());
		$form .= '</div>';

		// close city state
		$form .= '</div>';

		// zip code
		$zip = FormControls::textInput([
				'label' => 'ZIP',
				'type' => 'text',
				'name' => 'zip',
				'size' => 'medium'
			]);
		$zip = str_replace($replace, '', $zip);
		$form .= str_replace('type="text"', 'type="text" pattern="[\d]{5}(-[\d]{4})?" data-grouplength="5,4" data-delimiter="-" data-politespace=""', $zip);

		return $form;
	}
}