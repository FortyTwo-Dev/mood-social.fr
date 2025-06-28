<?php
function CreateUserBadgeTable(PDO $conn)
{
    $query = "
        CREATE TABLE USER_BADGE (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            badge_id INT REFERENCES BADGES(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, badge_id),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}
