<?php
function CreateUserTalkTable(PDO $conn) {
    $query = "
        Create TABLE USER_TALK (
            user_id INT REFERENCES USERS(id),
            talk_id INT REFERENCES TALKS(id),
            PRIMARY KEY (user_id, talk_id)
        );
    ";
    $conn->exec($query);
}