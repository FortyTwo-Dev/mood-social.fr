<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Newsletter - Store';

	include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/Newsletter/Newsletter.php');

    MethodVerify("POST");
    if (!IsAdmin()) { ToRoute('/'); }

    Store();
?>