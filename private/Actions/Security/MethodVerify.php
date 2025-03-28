<?php

// $Method_Use

$error_message = "";

if ($Method_Use === NULL) {
    header('Location: /errors/500/');
    echo "Il faut définir une methode à vérifier";
    die();
}

if ($_SERVER['REQUEST_METHOD'] !== $Method_Use) {
    $error_message = "Mauvais methode utiliser";
    header("Location: /errors/500/?error_message=$error_message");
    die();
}
