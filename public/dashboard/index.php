<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Dashboard';
	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');

	MethodVerify("GET");

	if (!IsAuth()) { GoToRoute('/'); }

	if (!IsAdmin()) { print 'no'; }
?>

<?php include_once( $root . '/view/dashboard.php' ) ?>