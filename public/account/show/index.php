<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Account - Accounts";

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');


MethodVerify('GET');
LogAction();

include_once($root . '/view/account/show.php');
?>