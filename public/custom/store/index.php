<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Custom/Custom.php');
include_once($root . '/private/Actions/Logs/Logs.php');



MethodVerify("POST");
LogAction();


Store();
