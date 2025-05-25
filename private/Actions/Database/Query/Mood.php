<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function GetMood() {
    $query = "SELECT MOODS.color AS color, MOODS.text_color AS text_color FROM USER_MOOD JOIN MOODS ON MOODS.id = USER_MOOD.mood_id WHERE user_id = :user_id AND DATE(USER_MOOD.attached_at) = CURDATE() ORDER BY USER_MOOD.attached_at DESC LIMIT 1";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}