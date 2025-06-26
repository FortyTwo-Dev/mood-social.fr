<?php

$root = $_SERVER['DOCUMENT_ROOT'];
session_start();
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Database/Query/Message.php');

$user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$user_id) {
    header('Location: /dashboard/users/?error=notfound');
    exit;
}

$user = GetUserId($user_id);
$messages = GetFeedMessagesById($user_id);

$data = [
    'user' => $user,
    'messages' => $messages,
];

include($root . '/view/dashboard/users/userpost.php');