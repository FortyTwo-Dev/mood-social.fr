<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');


function LoginValidation() {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($email) OR empty($password)) {
        GoToRoute('/auth/login/', 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        GoToRoute('/auth/register/', 'L’adresse email saisie n’est pas valide.', 'error');
    }

    $query = "SELECT role_id, password FROM USERS WHERE email = :email;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($password, $user['password'])) {
        GoToRoute('/auth/register/', 'Identifiants incorrects.', 'error');
    }

    return [
        'email' => $email,
        'role' => $user['role_id']
    ];
}