<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Users';
?>

<?php include_once( $root . '/view/dashboard/users.php' ) ?>