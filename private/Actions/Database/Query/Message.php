<?php
include_once($root . '/private/Actions/Database/Database.php');


function GetFeedMessages() {
    $query = "SELECT USERS.username AS username, USERS.id AS user_id, MESSAGES.content AS content, MESSAGES.path AS path FROM MESSAGES JOIN USERS ON MESSAGES.user_id = USERS.id JOIN TALKS ON MESSAGES.talk_id = TALKS.id ORDER BY MESSAGES.created_at DESC;";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}
