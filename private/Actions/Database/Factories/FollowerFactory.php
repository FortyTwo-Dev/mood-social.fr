<?php
function CreateFollowerTable(PDO $conn) {
    $query = "
        Create TABLE FOLLOWERS (
            sender_user_id INT REFERENCES USERS(id),
            receiver_user_id INT REFERENCES USERS(id),
            state INT,
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            Created_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (sender_user_id, receiver_user_id)
        );
    ";
    $conn->exec($query);
}