<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');


function GetTalks() {
    $query = "SELECT TALKS.id, TALKS.title FROM TALKS JOIN USER_TALK ON USER_TALK.talk_id = TALKS.id WHERE TALKS.type = 'Private' AND USER_TALK.user_id = :current_user_id GROUP BY TALKS.id ORDER BY (SELECT MESSAGES.updated_at FROM MESSAGES WHERE MESSAGES.talk_id = TALKS.id ORDER BY MESSAGES.updated_at DESC LIMIT 1) DESC;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':current_user_id', GetUserId(), PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function GetTalk($talk_id) {
    $query = "SELECT TALKS.id, TALKS.title, TALKS.description FROM TALKS WHERE TALKS.id = :talk_id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':talk_id', $talk_id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}