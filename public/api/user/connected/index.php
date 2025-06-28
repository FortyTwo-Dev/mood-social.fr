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

if (GetUserId()) {
    $query = "UPDATE USERS SET state = 2, last_activity =  NOW() WHERE id = :user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'error']);
    }

} else {
    echo json_encode(['success' => false, 'error' => 'ID manquant']);
}
exit;

echo json_encode(['success' => false, 'error' => 'Méthode non autorisée']);
?>