<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Follow/StoreRequest.php');
include_once($root . '/private/Request/Follow/UpdateRequest.php');
include_once($root . '/private/Request/Follow/DeleteRequest.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO FOLLOWERS (sender_user_id, receiver_user_id, state) VALUES (:sender_user_id, :receiver_user_id, :state)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Update() {

    $request = UpdateValidation();

    $query = "UPDATE FOLLOWERS SET state = :state WHERE sender_user_id = :sender_user_id AND receiver_user_id = :receiver_user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Delete() {

    $request = DeleteValidation();

    $query = "UPDATE FOLLOWERS SET state = :state WHERE sender_user_id = :sender_user_id AND receiver_user_id = :receiver_user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);

    
    $stmt->execute();

    ToRoute(Back());
}