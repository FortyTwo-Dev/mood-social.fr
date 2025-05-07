<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');


function StoreValidation() {

    if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        ToRoute(Back(), 'L’adresse email saisie n’est pas valide.', 'error');
    }
    $email = htmlspecialchars($_POST['email']);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password_confirmation = filter_input(INPUT_POST, 'password_confirmation', FILTER_SANITIZE_SPECIAL_CHARS);
    $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_SPECIAL_CHARS);

    $password = htmlspecialchars($password);
    $password_confirmation = htmlspecialchars($password_confirmation);

    if(empty($email) OR empty($password) OR empty($password_confirmation) OR empty($captcha)) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    if ($password !== $password_confirmation) {
        ToRoute(Back(), 'Les mots de passe ne correspondent pas.', 'error');
    }

    if ($captcha !== "on") {
        ToRoute(Back(), 'Il faut compléter le captcha', 'error');
    }

    $query = "SELECT email FROM USERS WHERE email = :email;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), 'L’adresse email saisie n’est pas valide.', 'error');
    }

    return [
        'email' => $email,
        'password' => $password
    ];
}