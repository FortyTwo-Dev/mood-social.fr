<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

include_once($root . '/private/Actions/Profil/Pdf/CreatePdf.php');

MethodVerify("GET");

$userId = GetUserId();

try {
    ExportUserToPDF($userId);
} catch (Exception $e) {
    echo "Erreur lors de la génération du PDF: " . $e->getMessage();
}
?>