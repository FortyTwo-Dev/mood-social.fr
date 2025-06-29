<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Database/Query/Message.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message_id'])) {
    $message_id = (int)$_POST['message_id'];
    DeleteFeedMessage($message_id);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;