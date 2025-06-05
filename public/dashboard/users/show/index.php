<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Users';

    include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/User.php');
	include_once($root . '/private/Actions/Logs/Logs.php');
	include_once($root . '/private/Actions/Dashboard/User.php');

	MethodVerify("GET");

	LogAction();
	if (!IsAdmin()) { ToRoute('/'); }

	// $user = GetUserWithId('username, email', $_GET['id']);
	$data = Show();
?>

<?php include_once( $root . '/view/dashboard/users/show.php' ) ?>