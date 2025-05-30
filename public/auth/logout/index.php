<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Register - MoodSocial';
	include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/Auth/Auth.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

	if (!IsAuth()) { ToRoute('/'); }
    
    MethodVerify("POST");

    Logout();
    LogAction();
?>