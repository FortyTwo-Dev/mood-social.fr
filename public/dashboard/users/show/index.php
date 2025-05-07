<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Users';

    include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/User.php');

	MethodVerify("GET");

	if (!IsAuth()) { ToRoute('/'); }

	if (!IsAdmin()) { print 'no'; }

	$user = SelectUserWithId('username, email');

?>

<?php include_once( $root . '/view/dashboard/users/show.php' ) ?>