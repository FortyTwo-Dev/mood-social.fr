<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security';
    include_once($root . '/private/Actions/Logs/Logs.php');
	
	LogAction();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/newsletter/create.php' ) ?>