<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Dashboard/Profile/Custom.php');
include_once($root . '/private/Actions/Logs/Logs.php');
include_once($root . '/private/Actions/Security/User.php');


if (!IsAdmin()) {
    ToRoute('/');
}


MethodVerify("POST");
LogAction();

Delete();
