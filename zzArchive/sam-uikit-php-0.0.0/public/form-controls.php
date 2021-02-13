<?php include_once('./partials/htmlOpen.php'); ?>

	<h1>Form Controls</h1>
	<h2>Text Inputs</h2>
<?php
echo SAMUIKit\FormControls::textInput([
	'label' => 'Basic text input',
	'type' => 'text',
	'name' => 'basic'
]);
?>
<code>
<pre>
echo SAMUIKit\FormControls::textInput([
    'label' => 'Basic text input',
    'type' => 'text',
    'name' => 'basic'
]);
</pre>
</code>

<?php
echo SAMUIKit\FormControls::textInput([
	'label' => 'Text input with all variables',
	'type' => 'text',
	'name' => 'basic',
	'errorMessage' => 'This text input was submitted with errors.',
	'hint' => 'This text input has a hint.',
	'value' => 'Hello world!'
]);
?> 

<code>
<pre>
echo SAMUIKit\FormControls::textInput([
    'label' => 'Text input with all variables',
    'type' => 'text',
    'name' => 'basic',
    'errorMessage' => 'This text input was submitted with errors.',
    'hint' => 'This text input has a hint.',
    'value' => 'Hello world!'
]);
</pre>
</code>

<?php
echo SAMUIKit\FormControls::textInput([
	'label' => 'Text area',
	'type' => 'textarea',
	'name' => 'textarea',
	'hint' => 'This text area has a hint.',
	'value' => 'Hello world!'
]);
?> 

<code>
<pre>
echo SAMUIKit\FormControls::textInput([
    'label' => 'Text area',
    'type' => 'textarea',
    'name' => 'textarea',
    'hint' => 'This text area has a hint.',
    'value' => 'Hello world!'
]);
</pre>
</code>

	<h2>Date Inputs</h2>
<?php
echo SAMUIKit\FormControls::dateInput([
	'label' => 'Basic date input',
	'name' => 'basic'
]);
?>

<code>
<pre>
echo SAMUIKit\FormControls::dateInput([
    'label' => 'Basic date input',
    'name' => 'basic'
]);
</pre>
</code>

<?php
echo SAMUIKit\FormControls::dateInput([
	'label' => 'Date input w/ all variables',
	'name' => 'basic',
	'errorMessage' => 'This date is required.',
	'hint' => 'This is a date hint.',
	'required' => true,
	'month' => 1,
	'day' => 1,
	'year' => 2000
]);
?>

<code>
<pre>
echo SAMUIKit\FormControls::dateInput([
    'label' => 'Date input w/ all variables',
    'name' => 'basic',
    'errorMessage' => 'This date is required.',
    'hint' => 'This is a date hint.',
    'required' => true,
    'month' => 1,
    'day' => 1,
    'year' => 2000
]);
</pre>
</code>

		<h2>Select</h2>
		<h3>dropdown</h3>
<?php
echo SAMUIKit\FormControls::select([
	'label' => 'Dropdown',
	'type' => 'dropdown',
	'name' => 'select-dropdown',
	'options' => [
		'option_1' => 'Option 1',
		'option_2' => 'Option 2',
		'option_3' => 'Option 3',
		'option_4' => 'Option 4',
		'option_5' => 'Option 5'
	]
]);
?>
<code>
<pre>
echo SAMUIKit\FormControls::select([
    'label' => 'Dropdown',
    'type' => 'dropdown',
    'name' => 'select-dropdown',
    'options' => [
        'option_1' => 'Option 1',
        'option_2' => 'Option 2',
        'option_3' => 'Option 3',
        'option_4' => 'Option 4',
        'option_5' => 'Option 5'
    ]
]);
</pre>
</code>
		<h3>radio</h3>
<?php
echo SAMUIKit\FormControls::select([
	'label' => 'Radio',
	'type' => 'radio',
	'name' => 'radio',
	'options' => [
		'option_1' => 'Option 1',
		'option_2' => 'Option 2',
		'option_3' => 'Option 3',
		'option_4' => 'Option 4',
		'option_5' => 'Option 5'
	]
]);
?>
<code>
<pre>
echo SAMUIKit\FormControls::select([
    'label' => 'Radio',
    'type' => 'radio',
    'name' => 'radio',
    'options' => [
        'option_1' => 'Option 1',
        'option_2' => 'Option 2',
        'option_3' => 'Option 3',
        'option_4' => 'Option 4',
        'option_5' => 'Option 5'
    ]
]);
</pre>
</code>	

		<h3>checkbox</h3>
<?php
echo SAMUIKit\FormControls::select([
	'label' => 'Checkbox',
	'type' => 'checkbox',
	'name' => 'checkbox',
	'options' => [
		'check_1' => 'Option 1',
		'check_2' => 'Option 2',
		'check_3' => 'Option 3',
		'check_4' => 'Option 4',
		'check_5' => 'Option 5'
	]
]);
?>
<code>
<pre>
echo SAMUIKit\FormControls::select([
    'label' => 'Checkbox',
    'type' => 'checkbox',
    'name' => 'checkbox',
    'options' => [
        'check_1' => 'Option 1',
        'check_2' => 'Option 2',
        'check_3' => 'Option 3',
        'check_4' => 'Option 4',
        'check_5' => 'Option 5'
    ]
]);
</pre>
</code>	

		<h3>Select with all the options</h3>
<?php
echo SAMUIKit\FormControls::select([
	'label' => 'Checkbox',
	'type' => 'checkbox',
	'name' => 'checkbox',
	'options' => [
		'check_1' => 'Option 1',
		'check_2' => 'Option 2',
		'check_3' => 'Option 3',
		'check_4' => 'Option 4',
		'check_5' => 'Option 5'
	],
	'required' => true,
	'hint' => 'The hint for the form control.',
	'errorMessage' => 'This form control has errors',
	'selected' => [
		'check_1',
		'check_3',
		'check_4'
	]
]);
?>
<code>
<pre>
echo SAMUIKit\FormControls::select([
    'label' => 'Checkbox',
    'type' => 'checkbox',
    'name' => 'checkbox',
    'options' => [
        'check_1' => 'Option 1',
        'check_2' => 'Option 2',
        'check_3' => 'Option 3',
        'check_4' => 'Option 4',
        'check_5' => 'Option 5'
    ],
    'required' => true,
    'hint' => 'The hint for the form control.',
    'errorMessage' => 'This form control has errors',
    'selected' => [
        'check_1',
        'check_3',
        'check_4'
    ]
]);
</pre>
</code>		

<h3>SAMUIKit Code Sample</h3>
<form class="usa-form-large">
<?php
echo SAMUIKit\FormTemplates::addressForm([
  			'label' => 'Mailing address',
  			'name' => 'mailing-address',
  		]);
?>
</form>
<?php include_once('./partials/htmlClose.php'); ?>

