<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = 'Profil';
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Logs/Logs.php');
require_once($root . '/private/Actions/Database/Query/Profil.php');
include_once($root . '/private/Actions/Dashboard/Profile/Custom.php');



MethodVerify("GET");

LogAction();
if (!IsAdmin()) {
	ToRoute('/');
}

$images = GetAllImages();


?>

<?php require_once($root . '/resources/layout/notification/base.php') ?>

<?php include_once($root . '/view/dashboard/profil/index.php') ?>