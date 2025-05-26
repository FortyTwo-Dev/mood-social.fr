<?php
function CreateUserTalkTable(PDO $conn) {
    $query = "
        Create TABLE USER_TALK (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            talk_id INT REFERENCES TALKS(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, talk_id)
        );
    ";
    $conn->exec($query);
}