<?php
include_once($root . '/private/Actions/Database/Database.php');

// function GetAllBadge(string $col) {
//     $query = "SELECT $col FROM BADGES";
//     $stmt = Connection()->prepare($query);
//     $stmt->execute();
//     return ($stmt->fetchAll(FETCH_ASSOC));
// }


function GetBadge(int $user_id) {
    $db = Connection();
    
    $queryMood = "
        SELECT mood_id, COUNT(DISTINCT DATE(attached_at)) AS day_count
        FROM USER_MOOD
        WHERE user_id = :user_id
        GROUP BY mood_id
        HAVING day_count >= 3
        ORDER BY day_count DESC
    ";
    
    $stmtMood = $db->prepare($queryMood);
    $stmtMood->execute(['user_id' => $user_id]);
    $moodData = $stmtMood->fetch(PDO::FETCH_ASSOC);
    
    if (!$moodData) {
        return null; 
    }
    
    $isEnhanced = $moodData['day_count'] >= 14;
    
    if ($isEnhanced) {
        $queryBadge = "
            SELECT badge, name
            FROM BADGES
            WHERE mood_id = :mood_id AND name LIKE '%++'
        ";
    } else {
        $queryBadge = "
            SELECT badge, name
            FROM BADGES
            WHERE mood_id = :mood_id AND name NOT LIKE '%++'
        ";
    }
    
    $stmtBadge = $db->prepare($queryBadge);
    $stmtBadge->execute(['mood_id' => $moodData['mood_id']]);
    $badgeResult = $stmtBadge->fetch(PDO::FETCH_ASSOC);
    
    if ($badgeResult) {
        $badgeResult['day_count'] = $moodData['day_count'];
        $badgeResult['is_enhanced'] = $isEnhanced;
    }
    
    return $badgeResult;
}


