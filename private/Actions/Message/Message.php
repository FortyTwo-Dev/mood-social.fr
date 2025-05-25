<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Message/StoreRequest.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO MESSAGES (content, path, user_id, talk_id) VALUES (:content, :path, :user_id, :talk_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindParam(':content', $request['content'], is_null($request['content']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':path', $request['path'], is_null($request['path']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':talk_id', $request['talk_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}