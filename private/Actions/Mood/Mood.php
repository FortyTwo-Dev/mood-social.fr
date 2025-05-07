<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/Mood/StoreRequest.php');
// include_once($root . '/private/Request/Captcha/UpdateRequest.php');
include_once($root . '/private/Actions/Routing/Route.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO USER_MOOD (user_id, mood_id) VALUES (:user_id, (SELECT id FROM MOODS WHERE color = :color))";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', $request['user_id']);
    $stmt->bindValue(':color', $request['color']);
    
    $stmt->execute();

    ToRoute('/');
}