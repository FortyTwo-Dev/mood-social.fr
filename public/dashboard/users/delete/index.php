<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Dashboard/Moderation.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    DeleteUser($_POST['email']);
    header('Location: /dashboard/users/');
    exit;
}