<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');


function LoginValidation() {

    if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        GoToRoute('/auth/login/', 'L’adresse email saisie n’est pas valide.', 'error');
    }

    $email = htmlspecialchars($_POST['email']);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_SPECIAL_CHARS);


    if(empty($email) OR empty($password) OR empty($captcha)) {
        GoToRoute('/auth/login/', 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT id, role_id, password FROM USERS WHERE email = :email;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($password, $user['password'])) {
        GoToRoute('/auth/login/', 'Identifiants incorrects.', 'error');
    }

    return [
        'id' => $user['id'],
        'email' => $email,
        'role' => $user['role_id']
    ];
}