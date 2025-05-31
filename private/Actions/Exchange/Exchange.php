<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Exchange/StoreRequest.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO EXCHANGES (sender_user_id, receiver_user_id, content, file_path) VALUES (:sender_user_id, :receiver_user_id, :content, :file_path)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':sender_user_id', $request['sender_user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':receiver_user_id', $request['receiver_user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':content', $request['content'], is_null($request['content']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':file_path', $request['file_path'], is_null($request['file_path']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    
    $stmt->execute();

    ToRoute(Back());
}