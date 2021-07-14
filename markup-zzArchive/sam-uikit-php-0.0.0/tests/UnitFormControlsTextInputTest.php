<?php

namespace SAMUIKit\tests;

use SAMUIKit\FormControls;

class UnitFormControlsTextInputTest extends \PHPUnit_Framework_TestCase
{
	private $baseExpected =
	'<div>'.
		'<label for="input-type-text">Text input label</label>'.
		'<input id="input-type-text" name="input-type-text" type="text">'.
	'</div>';	

	private $errorExpected = 
	'<div class="usa-input-error">'.
		'<label for="input-error" class="usa-input-error-label">Text input error</label>'.
		'<span id="input-error-input-error" class="usa-input-error-message" role="alert">Helpful error message</span>'.
		'<input id="input-error" name="input-error" type="text" aria-describedby="input-error-input-error">'.
	'</div>';

	private $successExpected =
	'<div>'.
		'<label for="input-success">Text input success</label>'.
		'<input id="input-success" class="usa-input-success" name="input-success" type="text">'.
	'</div>';

	private $textAreaExpected =	
	'<div>'.
		'<label for="input-type-textarea">Text area label</label>'.
			'<textarea id="input-type-textarea" name="input-type-textarea"></textarea>'.
	'</div>';	

	private function assertEquality($expected, $result)
	{
		$this->assertTrue($result == $expected, $expected .' : '. $result);
	}

	public function testUSWDSTextInput()
	{
		$result = FormControls::textInput([
			'label' => 'Text input label',
			'type' => 'text',
			'name' => 'input-type-text'
		]);
		$this->assertEquality($this->baseExpected, $result);
	}

	public function testUSWDSTextInputError()
	{
		$result = FormControls::textInput([
			'label' => 'Text input error',
			'type' => 'text',
			'name' => 'input-error',
			'errorMessage' => 'Helpful error message'
		]);
		$this->assertEquality($this->errorExpected, $result);
	}

	public function testUSWDSTextInputSuccess()
	{
		$result = FormControls::textInput([
			'label' => 'Text input success',
			'type' => 'text',
			'name' => 'input-success',
			'wasSuccess' => true
		]);
		$this->assertEquality($this->successExpected, $result);
	}

	public function testUSWDSTextArea()
	{
		$result = FormControls::textInput([
			'label' => 'Text area label',
			'type' => 'textarea',
			'name' => 'input-type-textarea'
		]);
		$this->assertEquality($this->textAreaExpected, $result);
	}

	/**
	 * 
	 * Method chaining tests.
	 * 
	 */
	public function testTextInputMethodChaining()
	{
		$result = FormControls::createTextInput()
			->setLabel('Text input label')
			->setType('text')
			->setName('input-type-text')
			->getHtml();
		$this->assertEquality($this->baseExpected, $result);
	}

	public function testTextInputMethodChainingError()
	{
		$result = FormControls::createTextInput()
			->setLabel('Text input error')
			->setType('text')
			->setName('input-error')
			->setErrorMessage('Helpful error message')
			->getHtml();
		$this->assertEquality($this->errorExpected, $result);
	}

	public function testUSWDSTextInputMethodChainingSuccess()
	{
		$result = FormControls::createTextInput()
			->setLabel('Text input success')
			->setType('text')
			->setName('input-success')
			->setWasSuccess(true)
			->getHtml();
		$this->assertEquality($this->successExpected, $result);
	}	

	public function testUSWDSMethodChainingTextArea()
	{
		$result = FormControls::createTextInput()
			->setLabel('Text area label')
			->setType('textarea')
			->setName('input-type-textarea')
			->getHtml();
		$this->assertEquality($this->textAreaExpected, $result);
	}

	public function testUSWDSTextInputMethodChainingConvertToError()
	{
		$input = FormControls::createTextInput()
			->setLabel('Text input label')
			->setType('text')
			->setName('input-type-text');
		$result = $input->getHtml();
		$this->assertEquality($this->baseExpected, $result);

		$expected =
		'<div class="usa-input-error">'.
			'<label for="input-type-text" class="usa-input-error-label">Text input label</label>'.
			'<span id="input-type-text-input-error" class="usa-input-error-message" role="alert">Helpful error message</span>'.
			'<input id="input-type-text" name="input-type-text" type="text" aria-describedby="input-type-text-input-error">'.
		'</div>';

		$errorResult = $input
			->setErrorMessage('Helpful error message')
			->getHtml();
		$this->assertEquality($this->baseExpected, $result);		


	}
}