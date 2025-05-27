<?php
	session_start();
	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security - Create';
    include_once($root . '/private/Actions/Logs/Logs.php');
	include_once($root . '/private/Actions/Security/User.php');
	
	
	LogAction();
	if (!IsAdmin()) { ToRoute('/'); }
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/security/captcha/create.php' ) ?>