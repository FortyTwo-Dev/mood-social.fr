<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');



function StoreValidation() {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = htmlspecialchars($username);

    if(empty($username) ) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT username FROM USERS WHERE id = :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();

    if (isset($stmt->fetch(PDO::FETCH_OBJ)->username)) {
        ToRoute(Back(), 'Vous avez déjà définie votre nom d\'utilisateur.', 'error');
    }

    $query = "SELECT id FROM USERS WHERE username = :username;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), 'Le nom d\'utilisateur existe déjà.', 'error');
    }

    return [
        'username' => $username,
    ];
}