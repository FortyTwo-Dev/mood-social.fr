<?php
session_start();
header('Content-Type: application/json');
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');

LogAction();

$stmt = Connection()->query("SELECT image, id FROM CUSTOMS WHERE category = 'head';");
$heads = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = [];

foreach ($heads as $head){
    array_push($result, 
        [ 
            'image' => base64_encode(file_get_contents($root . '/storage/customs/head/' .$head['image'])),
            'id' => $head['id']
        ]
    );
}

echo json_encode([
    'images' => $result
]);

