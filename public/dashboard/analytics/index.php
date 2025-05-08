<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Analytics';

	include_once($root . '/private/Actions/Security/User.php');
	include_once($root . '/private/Actions/Security/Method.php');
	include_once($root . '/private/Actions/Database/Query/Log.php');
	include_once($root . '/private/Actions/Logs/Logs.php');


	MethodVerify("GET");

	if (!IsAdmin()) { ToRoute('/'); }
	$logs = GetAllLogs("ip, script_name, http_referer, request_uri, request_method");
	$all_status = GetStatusOccurrences();
	LogAction();
?>

<?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

<?php include_once( $root . '/view/dashboard/analytics/index.php' ) ?>