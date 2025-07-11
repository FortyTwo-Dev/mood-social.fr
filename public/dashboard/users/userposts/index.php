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

$user = GetUserWithId('id,username', $user_id);
$messages = GetFeedMessagesById($user_id);
$exchanges = GetUserExchangeMessages($user_id);



$data = [
    'user' => $user,
    'feed_messages' => $messages,
    'exchange_messages' => $exchanges,
];

include($root . '/view/dashboard/users/userpost.php');


