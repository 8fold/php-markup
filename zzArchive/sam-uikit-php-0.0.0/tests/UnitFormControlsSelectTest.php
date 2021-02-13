<?php

namespace SAMUIKit\tests;

use SAMUIKit\FormControls;

class UnitFormControlsSelectTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * 
	 * dropdown
	 * 
	 */
    public function testDropdownRequiredKeys()
    {
    	// The standard US Web Design services does not have variations
    	// for error handling; therefore, we wrap our return in a <div>
    	$expected = 
    	'<div>'.
    		'<label for="options">Dropdown label</label>'.
    		'<select id="options" name="options">'.
    			'<option value="value1">Option A</option>'.
    			'<option value="value2">Option B</option>'.
    			'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		]
    	]);
    	$this->assertTrue($result == $expected, $expected .' : '. $result);
    }

    public function testDropdownOptionalKeyRequired()
    {
    	$expected = 
    	'<div>'.
    		'<label for="options">Dropdown label</label>'.
    		'<select id="options" name="options" required="required">'.
    			'<option value="value1">Option A</option>'.
    			'<option value="value2">Option B</option>'.
    			'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		],
    		'required' => true
    	]);
    	$this->assertTrue($result == $expected, $expected .' : '. $result);
    }

    public function testDropdownOPtionalKeyHint()
    {
    	$expected = 
    	'<div>'.
    		'<label for="options">Dropdown label</label>'.
    		'<span class="usa-form-hint">This is a hint.</span>'.
    		'<select id="options" name="options">'.
    			'<option value="value1">Option A</option>'.
				'<option value="value2">Option B</option>'.
				'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		],
    		'hint' => 'This is a hint.'
    	]);
    	$this->assertTrue($result == $expected, $expected .' : '. $result);
    }

    public function testDropdownOptionalKeySelected()
    {
    	$expected = 
    	'<div>'.
    		'<label for="options">Dropdown label</label>'.
    		'<select id="options" name="options">'.
    			'<option value="value1">Option A</option>'.
    			'<option value="value2" selected="selected">Option B</option>'.
    			'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		],
    		'selected' => ['value2']
    	]);
    	$this->assertTrue($result == $expected, $expected .' : '. $result);
    }

    public function testDropdownOptionalKeySROnly()
    {
    	$expected = 
    	'<div>'.
    		'<label for="options" class="usa-sr-only">Dropdown label</label>'.
    		'<select id="options" name="options">'.
    			'<option value="value1">Option A</option>'.
				'<option value="value2">Option B</option>'.
				'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		],
    		'srOnly' => true
    	]);
    	$this->assertTrue($result == $expected, $expected ."\n\n". $result);
    }

    public function testDropdownOptionalKeyErrorMessage()
    {
    	$expected = 
    	'<div class="usa-input-error">'.
    		'<label for="options" class="usa-input-error-label">Dropdown label</label>'.
    		'<span id="options-input-error" class="usa-input-error-message" role="alert">This is an error message.</span>'.
    		'<select id="options" name="options" aria-describedby="options-input-error">'.
    			'<option value="value1">Option A</option>'.
    			'<option value="value2">Option B</option>'.
    			'<option value="value3">Option C</option>'.
			'</select>'.
		'</div>';
    	$result = FormControls::select([
    		'label' => 'Dropdown label',
    		'type' => 'dropdown',
    		'name' => 'options',
    		'options' => [
    			'value1' => 'Option A',
    			'value2' => 'Option B',
    			'value3' => 'Option C'
    		],
    		'errorMessage' => 'This is an error message.'
    	]);
    	$this->assertTrue($result == $expected, $expected .' : '. $result);
    }

    public function testDropdownOptionalKeyAdditionalText()
    {
        $expected = 
        '<div class="usa-input-error">'.
            '<label for="options" class="usa-input-error-label">Dropdown label <span class="usa-additional_text">(Required)</span></label>'.
            '<span id="options-input-error" class="usa-input-error-message" role="alert">This is an error message.</span>'.
            '<select id="options" name="options" aria-describedby="options-input-error">'.
                '<option value="value1">Option A</option>'.
                '<option value="value2">Option B</option>'.
                '<option value="value3">Option C</option>'.
            '</select>'.
        '</div>';
        $result = FormControls::select([
            'label' => 'Dropdown label',
            'type' => 'dropdown',
            'name' => 'options',
            'options' => [
                'value1' => 'Option A',
                'value2' => 'Option B',
                'value3' => 'Option C'
            ],
            'errorMessage' => 'This is an error message.',
            'additional-text' => '(Required)'
        ]);
        $this->assertTrue($result == $expected, $expected .' : '. $result);        
    }

    /**
	 * 
	 * checkbox
	 * 
	 */
	public function testCheckboxUSWDSSample()
	{
		$expected = 
        '<div>'.
            '<fieldset class="usa-fieldset-inputs">'.
                '<legend class="usa-sr-only">Historical figures 1</legend>'.
                '<ul class="usa-unstyled-list">'.
                    '<li>'.
                        '<input id="apple-pie" type="checkbox" name="pie[]" value="apple" checked="">'.
                        '<label for="apple-pie">Sojourner Truth</label>'.
                    '</li>'.
                    '<li>'.
                        '<input id="key-lime-pie" type="checkbox" name="pie[]" value="key-lime">'.
                        '<label for="key-lime-pie">Frederick Douglass</label>'.
                    '</li>'.
                    '<li>'.
                        '<input id="peach-pie" type="checkbox" name="pie[]" value="peach">'.
                        '<label for="peach-pie">Booker T. Washington</label>'.
                    '</li>'.
                    '<li>'.
                        '<input id="disabled-pie" type="checkbox" name="pie[]" value="disabled" disabled="">'.
                        '<label for="disabled-pie">George Washington Carver</label>'.
                    '</li>'.
                '</ul>'.
            '</fieldset>'.
        '</div>';
		$result = FormControls::select([
			'label' => 'Historical figures 1',
			'type' => 'checkbox',
			'name' => 'pie', // why is name not used for checkboxes
			'options' => [
				'apple' => 'Sojourner Truth',
				'key-lime' => 'Frederick Douglass',
				'peach' => 'Booker T. Washington',
				'disabled' => 'George Washington Carver'
			],
			'disabled' => ['disabled'],
            'selected' => ['apple'],
            'srOnly' => true
		]);
        $this->assertTrue($result == $expected, $expected ."\n\n". $result);
	}

    /**
     *
     * radio
     * 
     */
    public function testRadioUSWDSSample()
    {
        $expected = 
        '<div>'.
            '<fieldset class="usa-fieldset-inputs">'.
                '<legend class="usa-sr-only">Historical figures 2</legend>'.
                '<ul class="usa-unstyled-list">'.
                    '<li>'.
                        '<input id="pea-soup-soup" type="radio" name="soup" value="pea-soup" checked="">'.
                        '<label for="pea-soup-soup">Elizabeth Cady Stanton</label>'.
                    '</li>'.
                    '<li>'.
                        '<input id="chicken-noodle-soup" type="radio" name="soup" value="chicken-noodle">'.
                        '<label for="chicken-noodle-soup">Susan B. Anthony</label>'.
                    '</li>'.
                    '<li>'.
                        '<input id="tomato-soup" type="radio" name="soup" value="tomato">'.
                        '<label for="tomato-soup">Harriet Tubman</label>'.
                    '</li>'.
                '</ul>'.
            '</fieldset>'.
        '</div>';
        $result = FormControls::select([
            'label' => 'Historical figures 2',
            'type' => 'radio',
            'name' => 'soup',
            'options' => [
                'pea-soup' => 'Elizabeth Cady Stanton',
                'chicken-noodle' => 'Susan B. Anthony',
                'tomato' => 'Harriet Tubman'
            ],
            'selected' => ['pea-soup'],
            'srOnly' => true
        ]);
        $this->assertTrue($result == $expected, $expected ."\n\n". $result);
    }
}