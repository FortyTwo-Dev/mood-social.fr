<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/Profil/Message.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("POST");
    LogAction();

    Store();
?>