<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Newsletter';
?>

<?php include_once( $root . '/view/dashboard/newsletter.php' ) ?>