<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');


function StoreValidation() {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirmation = htmlspecialchars($_POST['password_confirmation']);

    if(empty($email) OR empty($password) OR empty($password_confirmation)) {
        GoToRoute('/auth/register/', 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    if ($password !== $password_confirmation) {
        GoToRoute('/auth/register/', 'Les mots de passe ne correspondent pas.', 'error');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        GoToRoute('/auth/register/', 'L’adresse email saisie n’est pas valide.', 'error');
    }

    $query = "SELECT email FROM USERS WHERE email = :email;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        GoToRoute('/auth/register/', 'L’adresse email saisie n’est pas valide.', 'error');
    }

    return [
        'email' => $email,
        'password' => $password
    ];
}