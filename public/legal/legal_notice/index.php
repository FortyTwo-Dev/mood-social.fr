<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Mentions légales";
include_once($root . '/private/Actions/Logs/Logs.php');
include_once($root . '/private/Actions/Security/User.php');

LogAction();



include($root . '/view/legal/legal_notice.php');
?>
