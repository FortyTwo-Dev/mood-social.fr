<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];

	include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/Captcha/Captcha.php');
    include_once($root . '/private/Actions/Logs/Logs.php');


    MethodVerify("POST");

    Update();
    LogAction();
?>