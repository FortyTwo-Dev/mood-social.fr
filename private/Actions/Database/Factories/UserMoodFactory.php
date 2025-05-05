<?php
function CreateUserMoodTable(PDO $conn) {
    $query = "
        Create TABLE USER_MOOD (
            user_id INT REFERENCES USERS(id),
            mood_id INT REFERENCES MOODS(id),
            attached_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (user_id, mood_id)
        );
    ";
    $conn->exec($query);
}