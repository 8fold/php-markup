<?php include_once('./partials/htmlOpen.php'); ?>

	<h1>Form Templates</h1>
	<h2>Sign In Form</h2>

<?php
echo SAMUIKit\FormTemplates::signInForm([
	'textInputs' => [
		[
			'label' => 'Email address',
			'type' => 'email',
			'name' => 'email',
			'required' => true
 		],
 		[
 			'label' => 'Password',
 			'type' => 'password',
 			'name' => 'password',
 			'required' => true
 		]
	],
	'createPath' => '/path/to/create/account',
	'forgotLinks' => [
		'/forgot/username' => 'Forgot username',
		'/forgot/password' => 'Forgot password'
	],
	'showPasswordOnClick' => 'ShowPasswordMethod'
]);


?>
<?php include_once('./partials/htmlClose.php'); ?>	