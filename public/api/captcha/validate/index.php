<?php
    include_once($root . '/private/Actions/Logs/Logs.php');

session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$validate = $_SESSION['captcha_answer'] ?? '';

$success = strtolower(trim($data['answer'] ?? '')) === strtolower($validate);
echo json_encode(['success' => $success]);

LogAction();