<?php
function CreateUserMoodTable(PDO $conn) {
    $query = "
        Create TABLE USER_MOOD (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            mood_id INT REFERENCES MOODS(id) ON DELETE CASCADE,
            attached_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (user_id, mood_id, attached_at)
        );
    ";
    $conn->exec($query);
}