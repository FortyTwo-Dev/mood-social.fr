<?php
session_start();
header('Content-Type: application/json');
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');
include_once($root . '/private/Request/Requester.php');
include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Auth/Auth.php');

MethodVerify("POST");

LogAction();

$user_id = GetUserId();
$message_id = ValidatePost('id');

if (!$message_id) {
    echo json_encode(['success' => false, 'error' => 'ID manquant']);
    exit;
}

try {
    $stmt = Connection()->prepare("DELETE FROM MESSAGE_LIKES WHERE user_id = :user_id AND message_id = :message_id");
    $stmt->execute([
        'user_id' => $user_id,
        'message_id' => $message_id
    ]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Erreur SQL']);
}