<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function GetMood(int $user_id) {
    $query = "SELECT MOODS.color AS color, MOODS.text_color AS text_color, MOODS.name AS name FROM USER_MOOD JOIN MOODS ON MOODS.id = USER_MOOD.mood_id WHERE user_id = :user_id AND DATE(USER_MOOD.attached_at) = CURDATE() ORDER BY USER_MOOD.attached_at DESC LIMIT 1";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function GetAllUserMood(int $user_id) {
    $query = "SELECT color, COUNT(color) AS number, name FROM MOODS JOIN USER_MOOD ON USER_MOOD.mood_id = MOODS.id WHERE USER_MOOD.user_id = :user_id GROUP BY color, name;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}