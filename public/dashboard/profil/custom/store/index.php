<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = 'profil';

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Dashboard/Profile/Custom.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();
if (!IsAdmin()) {
    ToRoute('/');
}

MethodVerify("POST");

Store();
