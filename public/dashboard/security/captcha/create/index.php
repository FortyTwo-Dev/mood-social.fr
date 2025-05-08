<?php
    include_once($root . '/private/Actions/Logs/Logs.php');

	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security - Create';
	LogAction();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/security/captcha/create.php' ) ?>