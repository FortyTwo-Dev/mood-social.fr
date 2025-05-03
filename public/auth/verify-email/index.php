<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Verification email - MoodSocial';
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/Logs/Logs.php');
    include_once($root . '/private/Actions/Auth/VerifyEmail.php');
    MethodVerify("GET");

    LogAction();

    VerifyEmail();
?>