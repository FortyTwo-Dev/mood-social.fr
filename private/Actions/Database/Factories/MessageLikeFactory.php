<?php
function CreateMessageLikeTable(PDO $conn) {
    $query = "
        Create TABLE MESSAGE_LIKES (
            user_id INT REFERENCES USERS(id),
            message_id INT REFERENCES MESSAGES(id),
            PRIMARY KEY (user_id, message_id)
        );
    ";
    $conn->exec($query);
}