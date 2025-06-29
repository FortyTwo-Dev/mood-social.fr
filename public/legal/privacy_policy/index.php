<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Politique de confidentialité";
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();

include($root . '/view/legal/privacy_policy.php');
include($root . '/resources/layout/head.php');

?>


