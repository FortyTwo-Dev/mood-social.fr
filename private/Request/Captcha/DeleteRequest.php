<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function DeleteValidation() {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if(empty($id)) {
        GoToRoute('/dashboard/security/', 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT id, title FROM CAPTCHAS WHERE id = :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $captcha = $stmt->fetch(PDO::FETCH_OBJ);

    if (!isset($captcha->id)) {
        GoToRoute('/dashboard/security/', 'Le captcha choisie n\'existe pas.', 'error');
    }

    return [
        'id' => $captcha->id,
        'title' => $captcha->title
    ];
}