<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Analytics';
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>


<?php include_once( $root . '/view/dashboard/analytics/index.php' ) ?>