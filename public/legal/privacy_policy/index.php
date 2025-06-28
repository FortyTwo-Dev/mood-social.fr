<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Politique de confidentialité";
include($root . '/resources/layout/head.php');


include($root . '/view/legal/privacy_policy.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();

?>


