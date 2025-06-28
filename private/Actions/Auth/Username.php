<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/User/Username/StoreRequest.php');
include_once($root . '/private/Actions/Database/Query/User.php');


function Store() {
    $request = StoreValidation();

    $query = "UPDATE USERS SET username = :username WHERE id = :id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':username', $request['username']);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();

    $_SESSION['username'] = $request['username'];
    
    header('Location: /');
    die();
}