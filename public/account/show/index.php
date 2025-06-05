<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Account - Accounts";

include_once($root . '/private/Actions/Security/Method.php');

MethodVerify('GET');

include_once($root . '/view/account/show.php');
?>