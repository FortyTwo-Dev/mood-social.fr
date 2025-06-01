<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');



function UpdateValidation()
{

    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = htmlspecialchars($description);

    if (empty($description)) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT description FROM USERS WHERE id = :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();



    return [
        'description' => $description,
    ];
}
