<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security';
    include_once($root . '/private/Actions/Logs/Logs.php');
	include_once($root . '/private/Actions/Security/User.php');
	
	if (!IsAdmin()) { ToRoute('/'); }
	LogAction();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/newsletter/create.php' ) ?>