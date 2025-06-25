<?php
function CreateBadgeTable(PDO $conn)
{
    $query = "
        CREATE TABLE BADGES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    badge TEXT,
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    user_id INT NOT NULL REFERENCES USERS(id) ON DELETE CASCADE,
    mood_id INT NOT NULL REFERENCES MOODS(id) ON DELETE CASCADE
);
    ";
    $conn->exec($query);
}
