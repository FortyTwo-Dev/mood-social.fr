<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Newsletter';

	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/Newsletter.php');
	include_once($root . '/private/Actions/Logs/Logs.php');


	MethodVerify("GET");

	if (!IsAdmin()) { ToRoute('/'); }
	$newsletters = GetAllNewsletter("id, object, created_at");
	LogAction();
?>

<?php include_once( $root . '/view/dashboard/newsletter/index.php' ) ?>