<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Dashboard';
	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Logs/Logs.php');


	MethodVerify("GET");

	if (!IsAuth()) { ToRoute('/'); }

	if (!IsAdmin()) { print 'no'; }
	LogAction();
?>

<?php include_once( $root . '/view/dashboard.php' ) ?>