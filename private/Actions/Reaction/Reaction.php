<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Actions/Database/Query/Reaction.php');

include_once($root . '/private/Request/Exchange/Reaction/StoreRequest.php');
include_once($root . '/private/Request/Exchange/Reaction/EditRequest.php');
include_once($root . '/private/Request/Exchange/Reaction/UpdateRequest.php');
include_once($root . '/private/Request/Exchange/Reaction/DeleteRequest.php');

function Store() {
    $request = StoreValidation();

    $query = "INSERT INTO REACTIONS (name, emoji) VALUES (:name, :emoji)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':name', $request['name'], is_null($request['name']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':emoji', $request['emoji'], is_null($request['emoji']) ? PDO::PARAM_NULL : PDO::PARAM_STR);

    $stmt->execute();

    ToRoute(Back());
}

function Index() {

    $reactions = GetAllReactions();

    return [
        'reactions' => $reactions,
    ];
}

function Edit($id) {

    $request = EditValidation($id);

    $reaction = GetReaction('id, name, emoji', $request['id']);

    return [
        'reaction' => $reaction,
    ];
}

function Update() {
    $request = UpdateValidation();

    $query = "UPDATE REACTIONS SET name = :name, emoji = :emoji WHERE id = :id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':name', $request['name'], is_null($request['name']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':emoji', $request['emoji'], is_null($request['emoji']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':id', $request['id'], PDO::PARAM_INT );

    $stmt->execute();

    ToRoute(Back());
}

function Delete() {

    $request = DeleteValidation();
 
    $query = "DELETE FROM REACTIONS WHERE id = :id";
    $stmt = Connection()->prepare($query);
 
    $stmt->bindValue(':id', $request['id'], PDO::PARAM_INT);
 
    $stmt->execute();
 
    ToRoute('/dashboard/reactions/', "La réaction a été supprimée définitivement avec succès", 'success');
}