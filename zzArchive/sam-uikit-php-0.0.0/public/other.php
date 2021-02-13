<?php include_once('./partials/htmlOpen.php'); ?>
<h1>Other Elements</h1>
<h2>Buttons</h2>
<?php
echo SAMUIKit\Other::button([
	'title' => 'Default button'
]);
echo SAMUIKit\Other::button([
	'title' => 'Alt button', 
	'type' => 'alt'
]);
echo SAMUIKit\Other::button([
	'title' => 'Secondary button', 
	'type' => 'secondary'
]);
echo SAMUIKit\Other::button([
	'title' => 'Gray button', 
	'type' => 'gray'
]);
echo SAMUIKit\Other::button([
	'title' => 'Outline button', 
	'type' => 'outline'
]);
?>

<span style="display: inline-block; background: #000000; padding: 10px;">
<?php 
echo SAMUIKit\Other::button([
	'title' => 'Outline inverse button', 
	'type' => 'outline-inverse'
]); 
?>
</span>

<?php
echo SAMUIKit\Other::button([
	'title' => 'Big button', 
	'type' => 'big'
]);
echo SAMUIKit\Other::button([
	'title' => 'Disabled button', 
	'type' => 'disabled'
]);
?>

<h2>Label</h2>
<?php
echo SAMUIKit\Other::label([
	'title' => 'Default label'
]);
echo SAMUIKit\Other::label([
	'title' => 'Big label', 
	'big' => true
]);
?>

<h2>Search Bar</h2>
<h3>Big</h3>
<?php
echo SAMUIKit\Other::searchBar([
	'label' => 'Searching',
	'type' => 'big',
	'action' => '#',
	'method' => 'GET'
]);
?>

<h3>Medium</h3>
<?php
echo SAMUIKit\Other::searchBar([
	'label' => 'Searching',
	'type' => 'medium',
	'action' => '#',
	'method' => 'GET'
]);
?>

<h3>Small</h3>
<?php
echo SAMUIKit\Other::searchBar([
	'label' => 'Searching',
	'type' => 'small',
	'action' => '#',
	'method' => 'GET'
]);
?>

<h3>Big w/ keywords</h3>
<?php
echo SAMUIKit\Other::searchBar([
	'label' => 'Searching',
	'type' => 'big',
	'action' => '#',
	'method' => 'GET',
	'keywords' => [
		'What',
		'is',
		'the',
		'Agile',
		'Manifesto'
	]
]);
?>

<h2>Alerts</h2>
<?php
echo SAMUIKit\Other::alert([
	'title' => 'Information Only',
	'message' => 'This is an infomrational message.'
]);

echo SAMUIKit\Other::alert([
	'title' => 'Success',
	'message' => 'This denotes a successful action was completed.',
	'type' => 'success'
]);

echo SAMUIKit\Other::alert([
	'title' => 'Warning',
	'message' => 'This denotes an important message, but not a deal-breaker.',
	'type' => 'warning'
]);

echo SAMUIKit\Other::alert([
	'title' => 'Error',
	'message' => 'This denotes an error of some kind has occurrred.',
	'type' => 'error'
]);
?>

<h2>Accordions</h2>
<h3>Borderless</h3>
<?php
echo SAMUIKit\Other::accordion([
	'items' => [
		[
			'title' => 'Collapsed Accordion 1',
			'content' => '<ul><li>This</li><li>accordion</li><li>was</li><li>collapsed</li><li>initially.</li></ul>'
		],
		[
			'title' => 'Expanded Accordion 1',
			'content' => '<p>This accordion started expanded.</p>',
			'expanded' => true
		]
	]
])
?>
<h3>Bordered</h3>
<?php
echo SAMUIKit\Other::accordion([
	'items' => [
		[
			'title' => 'Collapsed Accordion 1',
			'content' => '<ul><li>This</li><li>accordion</li><li>was</li><li>collapsed</li><li>initially.</li></ul>'
		],
		[
			'title' => 'Expanded Accordion 1',
			'content' => '<p>This accordion started expanded.</p>',
			'expanded' => true
		]
	],
	'bordered' => true
])
?>

<h2>Footers</h2>
<h3>Slim w/ only required keys</h3>
<?php
echo SAMUIKit\Other::footer([
	'type' => 'slim',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<h3>Slim w/ all the keys</h3>
<?php
echo SAMUIKit\Other::footer([
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

<h3>Medium w/ only required keys</h3>
<?php
echo SAMUIKit\Other::footer([
	'type' => 'medium',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<h3>Medium w/ all keys</h3>
<?php
echo SAMUIKit\Other::footer([
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

<h3>Big w/ only required keys</h3>
<?php
echo SAMUIKit\Other::footer([
	'type' => 'big',
	'logo' => [
		'path' => '/img/logo-img.png',
		'alt' => 'Alternative description of logo'
	],
	'name' => 'Name of Agency'
]);
?>

<h3>Big w/ all keys</h3>
<?php
echo SAMUIKit\Other::footer([
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
<?php include_once('./partials/htmlClose.php'); ?>