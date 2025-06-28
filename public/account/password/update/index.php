<?php
session_start();
include_once($root . '/private/Actions/Logs/Logs.php');



$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Auth/Password.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /account/show/');
    exit();
}

$authCheck = CheckAuthSession();
if (!$authCheck['authenticated']) {
    header('Location: ' . $authCheck['redirect']);
    exit();
}

$userId = $authCheck['user_id'];

$validation = ValidatePasswordData($_POST);
if (!$validation['valid']) {
    $errorParam = urlencode(implode(', ', $validation['errors']));
    header('Location: /account/show/?error=' . $errorParam);
    exit();
}

$result = UpdatePassword(
    $userId,
    $_POST['current-password'],
    $_POST['new-password']
);

if ($result['success']) {
    header('Location: /account/show/?success=password_updated');
} else {
    $errorParam = urlencode($result['message']);
    header('Location: /account/show/?error=' . $errorParam);
}

LogAction();
exit();
?>