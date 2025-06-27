<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetAllEvents(string $col) {
    $query = "SELECT $col FROM EVENTS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function GetEvent(string $col, int $id) {
    $query = "SELECT $col FROM EVENTS WHERE id = :id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_ASSOC));
}

function UserHaveAttendEvent(int $user_id): bool {
    $query = "SELECT USER_EVENT.user_id AS user_id FROM EVENTS JOIN USER_EVENT ON EVENTS.id = USER_EVENT.event_id WHERE user_id = :user_id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->execute();

    $value = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!empty($value)) {
        return ($value['user_id'] === $user_id);
    }
    else {
        return false;
    }
}

function GetAllUserInEvent(int $id) {
    $query = "SELECT USERS.username, 
    (SELECT MOODS.color FROM USER_MOOD JOIN MOODS ON MOODS.id = USER_MOOD.mood_id WHERE USER_MOOD.user_id = USER_EVENT.user_id AND DATE(USER_MOOD.attached_at) = CURDATE() ORDER BY USER_MOOD.attached_at DESC LIMIT 1) AS color 
    FROM EVENTS LEFT JOIN USER_EVENT ON EVENTS.id = USER_EVENT.event_id RIGHT JOIN USERS ON USERS.id = USER_EVENT.user_id WHERE EVENTS.id = $id";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_ASSOC));
}