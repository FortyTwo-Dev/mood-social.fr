<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Reaction';
	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	
	include_once($root . '/private/Actions/Logs/Logs.php');

	include_once($root . '/private/Actions/Reaction/Reaction.php');


	MethodVerify("GET");
	
	LogAction();
	if (!IsAdmin()) { ToRoute('/'); }
	
	$data = Index();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/reactions/index.php' ) ?>