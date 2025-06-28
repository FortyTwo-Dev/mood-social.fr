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
            JOIN TALKS ON MESSAGES.talk_id = 1
            LEFT JOIN MESSAGE_LIKES ON MESSAGES.id = MESSAGE_LIKES.message_id
            WHERE USERS.id IN (
            SELECT DISTINCT user_id
            FROM USER_MOOD
            WHERE mood_id = (
                SELECT mood_id
                FROM USER_MOOD
                WHERE user_id = :current_user_id
                ORDER BY attached_at DESC
                LIMIT 1
                )
            )
            AND MESSAGES.message_id IS NULL
            AND (USERS.status IS NULL OR USERS.status != 'banned')
            GROUP BY MESSAGES.id
            ORDER BY MESSAGES.created_at DESC";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':current_user_id', GetUserId(), PDO::PARAM_INT); 
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetGroupMessages(int $talk_id) {
    $query = "SELECT MESSAGES.content, MESSAGES.path, MESSAGES.user_id, USERS.username FROM MESSAGES JOIN USERS ON MESSAGES.user_id = USERS.id WHERE MESSAGES.talk_id = :talk_id ORDER BY MESSAGES.updated_at DESC;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':talk_id', $talk_id, PDO::PARAM_INT); 
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetExchangeMessages(int $user_id) {
    $query = "SELECT id, sender_user_id, receiver_user_id, content, file_path, updated_at, created_at FROM EXCHANGES WHERE (sender_user_id = :user_id OR receiver_user_id = :user_id) AND (sender_user_id = :current_user_id OR receiver_user_id = :current_user_id) ORDER BY created_at DESC;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->bindValue(':current_user_id', GetUserId(), PDO::PARAM_INT); 
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetUserExchangeMessages(int $user_id) {
    $query = "SELECT id, sender_user_id, receiver_user_id, content, file_path, updated_at, created_at FROM EXCHANGES WHERE sender_user_id = :user_id ORDER BY created_at DESC;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}



function GetFeedMessagesById(int $user_id) {
    $query = "SELECT * FROM MESSAGES WHERE user_id = :id ORDER BY created_at DESC";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}