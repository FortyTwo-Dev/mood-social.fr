<?php
session_start();
header('Content-Type: application/json');
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');
include_once($root . '/private/Request/Requester.php');

LogAction();

$input = json_decode(file_get_contents('php://input'), true);
$friend_id = isset($input['friend']) ? intval($input['friend']) : null;
$user_id = GetUserId();

if (!$friend_id || $friend_id === $user_id) {
    echo json_encode(['success' => false, 'error' => 'Requête invalide']);
    exit;
}

if (CheckFriendExists($user_id, $friend_id)) {
    echo json_encode(['success' => false, 'error' => 'Déjà amis ou en attente']);
    exit;
}

$query = "INSERT INTO FRIENDS (sender_user_id, receiver_user_id, state) VALUES (:user_id, :friend_id, :state);";
$stmt = Connection()->prepare($query);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':friend_id', $friend_id, PDO::PARAM_INT);
$stmt->bindValue(':state', 1, PDO::PARAM_INT);

$stmt->execute();

if (true) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Erreur serveur']);
}