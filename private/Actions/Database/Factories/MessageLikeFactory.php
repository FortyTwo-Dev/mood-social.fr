<?php
function CreateMessageLikeTable(PDO $conn) {
    $query = "
        Create TABLE MESSAGE_LIKES (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            message_id INT REFERENCES MESSAGES(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, message_id)
        );
    ";
    $conn->exec($query);
}