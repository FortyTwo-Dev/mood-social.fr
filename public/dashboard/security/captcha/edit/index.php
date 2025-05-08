<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security - Edit';

	include_once($root . '/private/Actions/Database/Query/Captcha.php');
	include_once($root . '/private/Actions/Logs/Logs.php');


	$captcha = GetCaptcha('id, title, content, question, answer');
	LogAction();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/security/captcha/edit.php' ) ?>