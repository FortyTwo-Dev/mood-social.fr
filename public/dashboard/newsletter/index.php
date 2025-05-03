<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Newsletter';

	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/Newsletter.php');

	MethodVerify("GET");

	if (!IsAdmin()) { GoToRoute('/'); }
	$newsletters = GetAllNewsletter("id, object, created_at");
?>

<?php include_once( $root . '/view/dashboard/newsletter/index.php' ) ?>