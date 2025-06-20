<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Reaction - Edit';

	include_once($root . '/private/Actions/Logs/Logs.php');
	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Reaction/Reaction.php');
	
	LogAction();
	if (!IsAdmin()) { ToRoute('/'); }

	$data = Edit($_GET['id']);
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/reactions/edit.php' ) ?>