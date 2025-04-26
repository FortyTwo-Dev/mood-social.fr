<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];

    include_once($root . '/private/Actions/Cookie/Cookie.php');
    include_once($root . '/private/Actions/Routing/Route.php');

    GoToRoute('/dashboard/analytics/', 'Message d\'information', 'info');

?>