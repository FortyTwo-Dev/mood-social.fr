<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Auth/Auth.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();


Delete();
