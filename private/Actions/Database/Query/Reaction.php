<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function GetAllReactions() {
    $query = "SELECT id, name, emoji, updated_at, created_at FROM REACTIONS ORDER BY name ASC;";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function GetReaction(string $col, string $id) {
    $query = "SELECT $col FROM REACTIONS WHERE id = :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function GetExchangeReactions(int $exchange_id) {
    $query = "SELECT id, name, emoji, USER_EXCHANGE_REACTION.user_id AS user_id FROM REACTIONS JOIN USER_EXCHANGE_REACTION ON USER_EXCHANGE_REACTION.reaction_id = REACTIONS.id WHERE USER_EXCHANGE_REACTION.exchange_id = :exchange_id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':exchange_id', $exchange_id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}