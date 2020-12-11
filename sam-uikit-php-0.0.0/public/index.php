<?php include_once('./partials/htmlOpen.php'); ?>

<p><strong>Buttons</strong></p>
<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Default'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Alt',
	'type' => 'alt'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Secondary',
	'type' => 'secondary'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Gray',
	'type' => 'gray'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Outline',
	'type' => 'outline'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="background: #000000; text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Inverse',
	'type' => 'outline-inverse'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Big',
	'type' => 'big'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Disabled',
	'type' => 'disabled'
	]);
?>
</div>

<div class="usa-width-one-third" style="text-align: center;">
<?php
echo SAMUIKit\Other::button([
	'title' => 'Has cancel',
	'cancel' => '#'
	]);
?>
</div>

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::button(['title' => 'Dismiss', 'type' => 'dismiss']);
?>
</div>

<p style="clear: both;"><strong>Labels</strong></p>
<div class="usa-with-one-whole">
<div class="usa-width-one-half" style="text-align: center;">
<?php
echo SAMUIKit\Other::label([
	'title' => 'Standard Label'
	]);
?>
</div>

<div class="usa-width-one-half" style="text-align: center;">
<?php
echo SAMUIKit\Other::label([
	'title' => 'Big Label',
	'big' => true
	]);
?>
</div>
</div>

<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half" style="text-align: center;">
	<?php
	echo SAMUIKit\Other::label([
		'title' => 'Label w/ more class',
		'moreClass' => 'some-class'
		]);
	?>
	</div>

	<div class="usa-width-one-half" style="text-align: center;">
	<?php
	echo SAMUIKit\Other::label([
		'title' => 'Label w/ background color',
		'background' => 'success'
		]);
	?>
	</div>
</div>

<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half" style="text-align: center;">
	<?php
	echo SAMUIKit\Other::label([
		'title' => 'Label w/ more class',
		'moreClass' => 'some-class'
		]);
	?>
	</div>

	<div class="usa-width-one-half" style="text-align: center;">
	<?php
	echo SAMUIKit\Other::label([
		'title' => 'Label w/ icon',
		'icon' => 'success'
		]);
	?>
	</div>
</div>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half" style="text-align: center;">
	<ul>

	<?php
	echo SAMUIKit\Other::label([
		'title' => 'Label surrounded by &lt;li&gt;Word&lt;/li&gt;',
		'surround' => '<li>Word: |</li>'
		]);
	?>
	</ul>
	</div>
</div>

<p style="clear: both;"><strong>Tables (no component)</strong></p>
  <p>Bordered Table</p>

  <table>
    <thead>
      <tr>
        <th scope="col">Document title</th>
        <th scope="col">Description</th>
        <th scope="col">Year</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Declaration of Independence</th>
        <td>Statement adopted by the Continental Congress declaring independence from the British Empire.</td>
        <td>1776</td>
      </tr>
      <tr>
        <th scope="row">Bill of Rights</th>
        <td>The first ten amendments of the U.S. Constitution guaranteeing rights and freedoms.</td>
        <td>1791</td>
      </tr>
      <tr>
        <th scope="row">Declaration of Sentiments</th>
        <td>A document written during the Seneca Falls Convention outlining the rights that American women should be entitled to as citizens.</td>
        <td>1848</td>
      </tr>
      <tr>
        <th scope="row">Emancipation Proclamation</th>
        <td>An executive order granting freedom to slaves in designated southern states.</td>
        <td>1863</td>
      </tr>
    </tbody>
  </table>

  <p>Borderless Table</p>

  <table class="usa-table-borderless">
    <thead>
      <tr>
        <th scope="col">Document Title</th>
        <th scope="col">Description</th>
        <th scope="col">Year</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Declaration of Independence</th>
        <td>Statement adopted by the Continental Congress declaring independence from the British Empire.</td>
        <td>1776</td>
      </tr>
      <tr>
        <th scope="row">Bill of Rights</th>
        <td>The first ten amendments of the U.S. Constitution guaranteeing rights and freedoms.</td>
        <td>1791</td>
      </tr>
      <tr>
        <th scope="row">Declaration of Sentiments</th>
        <td>MadeA document written during the Seneca Falls Convention outlining the rights that American women should be entitled to as citizens.</td>
        <td>1848</td>
      </tr>
      <tr>
        <th scope="row">Emancipation Proclamation</th>
        <td>An executive order granting freedom to slaves in designated southern states.</td>
        <td>1863</td>
      </tr>      
    </tbody>
  </table>

<p><strong>Accordions</strong></p>
<p>Borderless</p>
<?php
echo SAMUIKit\Other::multipleAccordions([
	[
		'title' => 'Collapsed Accordion 1',
		'content' => '<ul><li>This</li><li>accordion</li><li>was</li><li>collapsed</li><li>initially.</li></ul>'
	],
	[
		'title' => 'Expanded Accordion 1',
		'content' => '<p>This accordion started expanded.</p>',
		'expanded' => true
	]
])
?>

<p>Bordered</p>
<?php
echo SAMUIKit\Other::multipleAccordions([
	[
		'title' => 'Collapsed Accordion 1',
		'content' => '<ul><li>This</li><li>accordion</li><li>was</li><li>collapsed</li><li>initially.</li></ul>',
		'bordered' => true
	],
	[
		'title' => 'Expanded Accordion 1',
		'content' => '<p>This accordion started expanded.</p>',
		'expanded' => true,
		'bordered' => true
	]
])
?>

<p><strong>Alerts</strong></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Alert with no Type',
		'message' => 'Default is information.'
		]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Information Type',
		'message' => 'Informational alert.',
		'type' => 'info'
		]);
	?>
	</div>	
</div>

<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Success',
		'message' => 'Alert denoting successful completion of something.',
		'type' => 'success'
		]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Warning',
		'message' => 'Alert denoting something that is important, but not a deal-breaker.',
		'type' => 'warning'
		]);
	?>
	</div>	
</div>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Error',
		'message' => 'Alert denoting an error has occured with a request.',
		'type' => 'error'
		]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Other::alert([
		'title' => 'Informational w/ Dismiss',
		'message' => 'This alert can be dismissed by a logged in user.',
		'dismissPath' => '#',
		'csrfField' => '<input type="hidden" name="csrf-token" value="something" />'
		]);
	?>
	</div>	
</div>

<p style="clear: both; padding-top: 20px;"><strong>Form Controls</strong></p>
<p>Text Inputs</p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text input label',
		'type' => 'text',
		'name' => 'text-input-label'
		]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text input w/ hint',
		'type' => 'text',
		'name' => 'text-input-label',
		'hint' => 'Inline help text'
		]);
	?>
	</div>	
</div>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text input w/ hint',
		'type' => 'text',
		'name' => 'text-input-label-with-hint-pre-filled',
		'hint' => 'Inline help text',
		'value' => 'Pre-filled'
		]);
	?>	
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text input label',
		'type' => 'text',
		'name' => 'text-input-label-with-error',
		'errorMessage' => 'There was an error.',
		'hint' => 'Inline help text.'
		]);
	?>
	</div>	
</div>

<p>Text areas</p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text are label',
		'type' => 'textarea',
		'name' => 'text-area-label',
		'hint' => 'Inline help text.'
		]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormControls::textInput([
		'label' => 'Text are label',
		'type' => 'textarea',
		'name' => 'text-area-label',
		'errorMessage' => 'There was an error.',
		'hint' => 'Inline help text.'
		]);
	?>	
	</div>	
</div>

<p>Select</p>
<p><i>Dropdown</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Dropdown label',
		'type' => 'dropdown',
		'name' => 'dropdown',
		'hint' => 'Inline help text.',
		'options' => [
			'opt1' => 'Option 1',
			'opt2' => 'Option 2',
			'opt3' => 'Option 3',
			'opt4' => 'Option 4',
			'opt5' => 'Option 5'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Dropdown pre-selected',
		'type' => 'dropdown',
		'name' => 'dropdown2',
		'hint' => 'Inline help text.',
		'options' => [
			'2opt1' => 'Option 1',
			'2opt2' => 'Option 2',
			'2opt3' => 'Option 3',
			'2opt4' => 'Option 4',
			'2opt5' => 'Option 5'
		],
		'selected' => [
			'2opt3'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Dropdown pre-selected w/ error',
		'type' => 'dropdown',
		'name' => 'dropdown3',
		'hint' => 'Inline help text.',
		'errorMessage' => 'There was an error.',
		'options' => [
			'3opt1' => 'Option 1',
			'3opt2' => 'Option 2',
			'3opt3' => 'Option 3',
			'3opt4' => 'Option 4',
			'3opt5' => 'Option 5'
		],
		'selected' => [
			'3opt3'
		]
	]);
	?>
	</div>	

<p style="clear: both; padding-top: 40px;"><i>Radio</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Radio label',
		'type' => 'radio',
		'name' => 'radio_1',
		'hint' => 'Inline help text.',
		'options' => [
			'r1opt1' => 'Option 1',
			'r1opt2' => 'Option 2',
			'r1opt3' => 'Option 3',
			'r1opt4' => 'Option 4',
			'r1opt5' => 'Option 5'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Radio pre-selected',
		'type' => 'radio',
		'name' => 'radio_2',
		'hint' => 'Inline help text.',
		'options' => [
			'r2opt1' => 'Option 1',
			'r2opt2' => 'Option 2',
			'r2opt3' => 'Option 3',
			'r2opt4' => 'Option 4',
			'r2opt5' => 'Option 5'
		],
		'selected' => [
			'r2opt3'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Radio pre-selected w/ error',
		'type' => 'radio',
		'name' => 'radio_3',
		'hint' => 'Inline help text.',
		'errorMessage' => 'There was an error.',
		'options' => [
			'r3opt1' => 'Option 1',
			'r3opt2' => 'Option 2',
			'r3opt3' => 'Option 3',
			'r3opt4' => 'Option 4',
			'r3opt5' => 'Option 5'
		],
		'selected' => [
			'r3opt3'
		]
	]);
	?>
	</div>	
</div>

<p style="clear: both; padding-top: 40px;"><i>Checkbox</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Checkbox label',
		'type' => 'checkbox',
		'name' => 'checkbox_1',
		'hint' => 'Inline help text.',
		'options' => [
			'c1opt1' => 'Option 1',
			'c1opt2' => 'Option 2',
			'c1opt3' => 'Option 3',
			'c1opt4' => 'Option 4',
			'c1opt5' => 'Option 5'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Checkbox pre-selected',
		'type' => 'checkbox',
		'name' => 'checkbox_2',
		'hint' => 'Inline help text.',
		'options' => [
			'c2opt1' => 'Option 1',
			'c2opt2' => 'Option 2',
			'c2opt3' => 'Option 3',
			'c2opt4' => 'Option 4',
			'c2opt5' => 'Option 5'
		],
		'selected' => [
			'c2opt3',
			'c2opt5'
		]
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::select([
		'label' => 'Checkbox pre-selected w/ error',
		'type' => 'checkbox',
		'name' => 'checkbox_3',
		'hint' => 'Inline help text.',
		'errorMessage' => 'There was an error.',
		'options' => [
			'c3opt1' => 'Option 1',
			'c3opt2' => 'Option 2',
			'c3opt3' => 'Option 3',
			'c3opt4' => 'Option 4',
			'c3opt5' => 'Option 5'
		],
		'selected' => [
			'c3opt3',
			'c3opt5'
		]
	]);
	?>
	</div>	
</div>

<p style="clear: both; padding-top: 40px;"><i>Checkbox</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::dateInput([
		'label' => 'Date fieldset legend',
		'name' => 'date_1',
		'hint' => 'Inline help text.'
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::dateInput([
		'label' => 'Date fieldset legend - pref-filled',
		'name' => 'date_2',
		'hint' => 'Inline help text.',
		'month' => 1,
		'day' => 1,
		'year' => 2015
	]);
	?>
	</div>
	<div class="usa-width-one-third">
	<?php
	echo SAMUIKit\FormControls::dateInput([
		'label' => 'Date fieldset legend - pref-filled',
		'name' => 'date_3',
		'hint' => 'Inline help text.',
		'month' => 1,
		'day' => 1,
		'year' => 2015,
		'errorMessage' => 'There was an error.'
	]);
	?>
	</div>	
</div>

<p style="clear: both; padding-top: 20px;"><strong>Form Templates</strong></p>
<p style="clear: both; padding-top: 40px;"><i>Sign in form</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormTemplates::signInForm([
		'textInputs' => [
			[
			'label' => 'Email address',
			'type' => 'email',
			'name' => 'email',
			'hint' => 'Your registered email address.'
			],
			[
			'label' => 'Password',
			'type' => 'password',
			'name' => 'password',
			]
		],
	 	'createPath' => '/path/to/register',
	 	'forgotLinks' => [
	 		'/path/to/reset/password' => 'Forgot password'
	 	],
	 	'showPasswordOnClick' => 'ShowPasswordEventHandler'	
	]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\FormTemplates::signInForm([
		'textInputs' => [
			[
			'label' => 'Email address',
			'type' => 'email',
			'name' => 'email',
			'hint' => 'Your registered email address.',
			'errorMessage' => 'Invalid email address.',
			'value' => 'something is incorrect'
			],
			[
			'label' => 'Password',
			'type' => 'password',
			'name' => 'password',
			]
		],
	 	'createPath' => '/path/to/register',
	 	'forgotLinks' => [
	 		'/path/to/reset/password' => 'Forgot password'
	 	],
	 	'showPasswordOnClick' => 'ShowPasswordEventHandler'	
	]);
	?>
	</div>
</div>

<p style="clear: both; padding-top: 20px;"><strong>Form Controls</strong></p>
<p style="clear: both; padding-top: 40px;"><i>SAMUIKit Search Bars</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Search::searchBar([
		'label' => 'Search label',
		'type' => 'big',
		'action' => '#',
		'method' => 'GET'
	]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Search::searchBar([
		'label' => 'Search label',
		'type' => 'medium',
		'action' => '#',
		'method' => 'GET'
	]);
	?>
	</div>	
</div>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Search::searchBar([
		'label' => 'Search label',
		'type' => 'small',
		'action' => '#',
		'method' => 'GET'
	]);
	?>
	</div>
	<div class="usa-width-one-half">
	<?php
	echo SAMUIKit\Search::searchBar([
		'label' => 'Search label',
		'type' => 'small',
		'action' => '#',
		'method' => 'GET',
		'keywords' => [
			'These',
			'are',
			'search',
			'terms'
		]
	]);
	?>
	</div>	
</div>

<p style="clear: both; padding-top: 40px;"><i>SAMUIKit Search Bar w/ filters</i></p>
<div class="usa-with-one-whole" style="clear: both; padding-top: 20px;">
	<?php
	echo SAMUIKit\Search::searchBar([
		'label' => 'Search label',
		'type' => 'big',
		'action' => '#',
		'method' => 'GET',
		'filters' => [
			[
				'label' => 'Toggle-like application of checkbox',
				'srOnly' => true,
				'name' => 'filter_name_3',
				'type' => 'checkbox',
				'options' => [
					'f3opt1' => 'Exclude historical data?'
				]
			],				
			[
				'label' => 'Filter label',
				'name' => 'filter_name',
				'type' => 'dropdown',
				'options' => [
					'f1opt1' => 'Option 1',
					'f1opt2' => 'Option 2',
					'f1opt3' => 'Option 3'
				]
			],
			[
				'label' => 'More filtes - pre-selected',
				'name' => 'filter_name_2',
				'type' => 'dropdown',
				'options' => [
					'f2opt1' => 'Option 1',
					'f2opt2' => 'Option 2',
					'f2opt3' => 'Option 3'
				],
				'selected' => ['opt3']
			]
		]
	]);
	?>
</div>

<p><strong>Footers</strong></p>
<p><i>Slim w/ only required keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'slim',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<p><i>Slim w/ all the keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'slim',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency',
	'links' => [
		'/1' => 'Primary link',
		'/2' => 'Primary link',
		'/3' => 'Primary link',
		'/4' => 'Primary link',
		'/5' => 'Should not be displayed'
	],
	'number' => '(800) CALL-GOVT',
	'email' => 'info@agency.gov'
]);
?>

<p><i>Medium w/ only required keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'medium',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<p><i>Medium w/ all keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'medium',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency',
	'links' => [
		'/1' => 'Primary link',
		'/2' => 'Primary link',
		'/3' => 'Primary link',
		'/4' => 'Primary link',
		'/5' => 'Primary link',
		'/6' => 'Should not be displayed',
	],
	'number' => '(800) CALL-GOVT',
	'email' => 'info@agency.gov',
	'social' => [
		'facebook' => '/facebook',
		'twitter' => '/twitter',
		'youtube' => '/youtube',
		'rss' => '/rss'
	]
]);
?>

<p><i>Big w/ only required keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'big',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<p><i>Big w/ all keys</i></p>
<?php
echo SAMUIKit\Navigation::footer([
	'type' => 'big',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency',
	'number' => '(800) CALL-GOVT',
	'email' => 'info@agency.gov',
	'social' => [
		'facebook' => '/facebook',
		'twitter' => '/twitter',
		'youtube' => '/youtube',
		'rss' => '/rss'
	],
	'signUpTarget' => '/sign-up-target',
	'sections' => [
		[
			'title' => 'Topic',
			'links' => [
				'/1' => 'Secondary link',
				'/2' => 'Secondary link',
				'/3' => 'Secondary link',
				'/4' => 'Secondary link'
			]
		],
		[
			'title' => 'Topic',
			'links' => [
				'/1' => 'Secondary link',
				'/2' => 'Secondary link',
				'/3' => 'Secondary link',
				'/4' => 'Secondary link'
			]
		],
		[
			'title' => 'Topic',
			'links' => [
				'/1' => 'Secondary link',
				'/2' => 'Secondary link',
				'/3' => 'Secondary link',
				'/4' => 'Secondary link'
			]
		],
		[
			'title' => 'Topic',
			'links' => [
				'/1' => 'Secondary link',
				'/2' => 'Secondary link',
				'/3' => 'Secondary link',
				'/4' => 'Secondary link'
			]
		],
		[
			'title' => 'Not displayed',
			'links' => [
				'/1' => 'Secondary link',
				'/2' => 'Secondary link',
				'/3' => 'Secondary link',
				'/4' => 'Secondary link'
			]
		]		
	]
]);
?>

<p><strong>SAMUIKit Address Form</strong></p>
<form class="usa-form-large">
<?php
echo SAMUIKit\FormTemplates::addressForm([
  			'label' => 'Mailing address',
  			'name' => 'mailing-address'
  		]);
?>
</form>

<p><strong>SAMUIKit Name Form</strong></p>
<form class="usa-form-large">
<?php
echo SAMUIKit\FormTemplates::nameForm([
  			'label' => 'Name',
  			'name' => 'name'
  		]);
?>
</form>

<p><strong>Navigation</strong></p>
<p><i>Single</i></p>
<?php
echo SAMUIKit\Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Current page',
					'path'  => 'current'
				],
				[
					'title' => 'Parent link',
					'path' => '#parent1'
				],
				[
					'title' => 'Parent link',
					'path' => '#parent2'
				]
			],
			'current' => '/current/'
		]);
?>
<p><i>Child</i></p>
<?php
echo SAMUIKit\Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Parent link',
					'path'  => '#'
				],
				[
					'title' => 'Current page',
					'path' => 'current',
					'submenu' => [
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => 'child'
						]												
					]
				],
				[
					'title' => 'Parent link',
					'path' => '#'
				]
			],
			'current' => '/current/child'
		]);
?>
<p><i>Grandchild</i></p>
<?php
echo SAMUIKit\Navigation::sideNavigation([
			'menu' => [
				[
					'title' => 'Parent link',
					'path'  => '#'
				],
				[
					'title' => 'Current page',
					'path' => 'current',
					'submenu' => [
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => 'child',
							'submenu' => [
								[
									'title' => 'Grandchild link',
									'path' => '#',
								],
								[
									'title' => 'Grandchild link',
									'path' => '#',
								],
								[
									'title' => 'Grandchild link',
									'path' => 'grandchild',
								]
							]
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						],
						[
							'title' => 'Child link',
							'path' => '#'
						]												
					]
				],
				[
					'title' => 'Parent link',
					'path' => '#'
				]
			],
			'current' => '/current/child/grandchild'
		]);
?>
<p><strong>Actions</strong></p>
<div class="usa-grid-full">
<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::action([
	'createTitle' => 'Item',
	'type' => 'create',
	'target' => '#'
	]);
?>
</div>
<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::action([
	'type' => 'delete',
	'target' => '#'
	]);
?>
</div>	 

<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::action([
	'type' => 'edit',
	'target' => '#'
	]);
?>
</div>	 
<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::action([
	'type' => 'archive',
	'target' => '#'
	]);
?>
</div>	 
<div class="usa-width-one-sixth" style="text-align: center;">
<?php
echo SAMUIKit\Other::action([
	'type' => 'unarchive',
	'target' => '#'
	]);
?>
</div>
</div>

<p><strong>Search Result</strong></p>
<div class="usa-grid-full">
<?php
echo SAMUIKit\Search::result([
	'content' => [
		'<p><strong><a href="#">This is a sample title</a></strong></p>',

	],
	'metadata' => [
		'<p><strong>Metadata 1:</strong> This is a piece of metadata.</p>'
	]

]);
?>
<?php
echo SAMUIKit\Search::result([
	'content' => [
		'<p><strong><a href="#">This is a sample title</a></strong></p>',
		'<p>This search result allows actions to be performed.</p>'
		
	],
	'metadata' => [
		'<p><strong>Metadata 1:</strong> This is a piece of metadata.</p>',
		'<p><strong>Metadata 2:</strong> This is another piece of metadata.</p>'
	],
	'actions' => [
		[
			'type' => 'archive',
			'target' => '#'
		],
		[
			'type' => 'edit',
			'target' => '#'
		],
		[
			'type' => 'delete',
			'target' => '#'
		]
	]

]);
?>
<?php
echo SAMUIKit\Search::result([
	'content' => [
		'<p><strong><a href="#">This is a sample title</a></strong></p>',
		'<p>The search result view inherits from this view. The only difference is that the search result view has a wrapping container for the addition of a border at the bottom. Therefore, the information architecture of both elements is the same.</p>'
		
	]
]);
?>
</div>

<p><strong>Resource</strong></p>
<div class="usa-width-one-whole">
<h1>Viewing a Single Resource</h1>
<?php
echo SAMUIKit\Other::resource([
	'content' => [
		'<p>The search result view inherits from this view. The only difference is that the search result view has a wrapping container for the addition of a border at the bottom. Therefore, the information architecture of both elements is the same.</p>',

	]
]);
?>
<?php
echo SAMUIKit\Other::resource([
	'content' => [
		'<p>The search result view inherits from this view. The only difference is that the search result view has a wrapping container for the addition of a border at the bottom. Therefore, the information architecture of both elements is the same.</p>',

	],
	'metadata' => [
		[
			'template' => 'Other|label',
			'config' => [
				'title' => 'New',
				'surround' => '<p>|</p>'
			]
		],	
		'<p><strong>Metadata 1:</strong> This is a piece of metadata.</p>'
	],
	'actions' => [
		[
			'type' => 'archive',
			'target' => '#'
		],
		[
			'type' => 'edit',
			'target' => '#'
		],
		[
			'type' => 'delete',
			'target' => '#'
		]
	]
]);
?>
</div>

<p><strong>State select</strong></p>
<div class="usa-width-one-whole">
<?php
echo SAMUIKit\FormControls::stateSelect();
?>
</div>
<?php include_once('./partials/htmlClose.php'); ?>