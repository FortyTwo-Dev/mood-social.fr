<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/User/Description/UpdateRequest.php');
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Routing/Route.php');


function Update()
{

    $request = UpdateValidation();

    $query = "UPDATE USERS SET description = :description WHERE id = :id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':description', $request['description']);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();

    ToRoute(Back());
    die();
}
