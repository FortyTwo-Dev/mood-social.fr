<?php
function CreateFriendTable(PDO $conn) {
    $query = "
        Create TABLE FRIENDS (
            sender_user_id INT REFERENCES USERS(id),
            receiver_user_id INT REFERENCES USERS(id),
            state INT,
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (sender_user_id, receiver_user_id)
        );
    ";
    $conn->exec($query);
}