<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Friend/AcceptRequest.php');
include_once($root . '/private/Request/Friend/RejectRequest.php');

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