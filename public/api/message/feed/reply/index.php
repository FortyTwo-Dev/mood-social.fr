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

$message_id = ValidatePost('message_id');

if ($message_id) {

    $query = "SELECT MESSAGES.id, content, USERS.username AS username FROM MESSAGES JOIN USERS ON MESSAGES.user_id = USERS.id WHERE message_id = :message_id;";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':message_id', $message_id, PDO::PARAM_INT);
    
    $stmt->execute();

    echo json_encode(['success' => true, 'messages' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
} else {
    echo json_encode(['success' => false, 'error' => 'ID manquant']);
}
exit;

echo json_encode(['success' => false, 'error' => 'Méthode non autorisée']);
?>