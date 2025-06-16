<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function GetAllReactions() {
    $query = "SELECT id, name, emoji FROM REACTIONS ORDER BY name ASC;";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function GetExchangeReactions(int $user_id, int $exchange_id) {
    $query = "SELECT id, name, emoji FROM REACTIONS JOIN USER_EXCHANGE_REACTION ON USER_EXCHANGE_REACTION.reaction_id = REACTIONS.id WHERE USER_EXCHANGE_REACTION.user_id = :user_id AND USER_EXCHANGE_REACTION.exchange_id = :exchange_id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':exchange_id', $exchange_id, PDO::PARAM_INT); 
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}