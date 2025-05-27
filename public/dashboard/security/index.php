<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security';
	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/Captcha.php');
	include_once($root . '/private/Actions/Logs/Logs.php');


	MethodVerify("GET");
	
	LogAction();
	if (!IsAdmin()) { ToRoute('/'); }
	
	$captchas = GetAllCaptchas("id, title, question, answer");
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/security/index.php' ) ?>