<?php
session_start();
header('Content-Type: application/json');
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');
include_once($root . '/private/Request/Requester.php');

LogAction();

$query = ValidateGet('q');
Required([$query]);

$users = SearchUsers($query);

if (!$users) {
    echo json_encode(['error' => 'No user available']);
    exit;
}

echo json_encode([
    'users' => $users
]);

function SearchUsers(string $query): array {
    $sql = "
        SELECT id, username
        FROM USERS
        WHERE id != :id
        AND INSTR(LOWER(username), LOWER(:search)) > 0
        ORDER BY username ASC
        LIMIT 20;
    ";

    $stmt = Connection()->prepare($sql);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':search', $query, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}