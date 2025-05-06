<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Security - Create';
?>

<?php include_once( $root . '/view/dashboard/security/captcha/create.php' ) ?>