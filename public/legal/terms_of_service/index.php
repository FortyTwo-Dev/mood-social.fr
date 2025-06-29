<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Conditions d'utilisation";
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();
include($root . '/resources/layout/head.php');
include($root . '/view/legal/terms_of_service.php');
