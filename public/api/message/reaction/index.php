<?php
session_start();
header('Content-Type: application/json');
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Database/Query/Reaction.php');
include_once($root . '/private/Actions/Logs/Logs.php');

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Security/User.php');

MethodVerify("GET");

LogAction();

echo json_encode(['reactions' => GetAllReactions()]);