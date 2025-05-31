<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Friend/AcceptRequest.php');
include_once($root . '/private/Request/Friend/RejectRequest.php');
include_once($root . '/private/Request/Friend/StoreRequest.php');
include_once($root . '/private/Request/Friend/UpdateRequest.php');
include_once($root . '/private/Request/Friend/DeleteRequest.php');

function Accept() {

    $request = AcceptValidation();

    $query = "UPDATE FRIENDS SET state = 2 WHERE sender_user_id = :user_id AND receiver_user_id = :current_user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':current_user_id', $request['current_user_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Reject() {

    $request = RejectValidation();

    $query = "UPDATE FRIENDS SET state = 0 WHERE sender_user_id = :user_id AND receiver_user_id = :current_user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':current_user_id', $request['current_user_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO FRIENDS (sender_user_id, receiver_user_id, state) VALUES (:sender_user_id, :receiver_user_id, :state)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Update() {

    $request = UpdateValidation();

    $query = "UPDATE FRIENDS SET state = :state WHERE (sender_user_id = :sender_user_id AND receiver_user_id = :receiver_user_id) OR (sender_user_id = :receiver_user_id AND receiver_user_id = :sender_user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Delete() {

    $request = DeleteValidation();

    $query = "UPDATE FRIENDS SET state = :state WHERE (sender_user_id = :sender_user_id AND receiver_user_id = :receiver_user_id) OR (sender_user_id = :receiver_user_id AND receiver_user_id = :sender_user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':state', $request['state'], PDO::PARAM_INT);

    
    $stmt->execute();

    ToRoute(Back());
}