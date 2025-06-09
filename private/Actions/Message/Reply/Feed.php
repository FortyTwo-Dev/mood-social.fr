<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Message/Feed/Reply/StoreRequest.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO MESSAGES (content, user_id, talk_id, message_id) VALUES (:content, :user_id, :talk_id, :message_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindParam(':content', $request['content'], is_null($request['content']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':talk_id', 1, PDO::PARAM_INT);
    $stmt->bindValue(':message_id', $request['message_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute('/talk/feed/');
}