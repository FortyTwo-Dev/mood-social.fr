<?php
	$app = '';
	$root = $_SERVER['DOCUMENT_ROOT'] . $app;
	$page_title = 'Login - MoodSocial';

	include_once($root . '/private/Actions/RandomColor.php');
?>

<?php include( $root . '/view/auth/login.php' ) ?>