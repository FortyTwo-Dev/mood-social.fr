<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');


function GetFeedMessages() {
    $query = "SELECT 
            USERS.username AS username,
            USERS.id AS user_id,
            MESSAGES.id AS id,
            MESSAGES.content AS content,
            MESSAGES.path AS path,
            COUNT(MESSAGE_LIKES.user_id) AS like_count,
            MAX(MESSAGE_LIKES.user_id = :current_user_id) AS liked_by_current_user
            FROM MESSAGES
            JOIN USERS ON MESSAGES.user_id = USERS.id
            JOIN TALKS ON MESSAGES.talk_id = TALKS.id
            LEFT JOIN MESSAGE_LIKES ON MESSAGES.id = MESSAGE_LIKES.message_id
            GROUP BY MESSAGES.id
            ORDER BY MESSAGES.created_at DESC";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':current_user_id', GetUserId(), PDO::PARAM_INT); 
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}
