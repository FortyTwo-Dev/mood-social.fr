<?php
function CreateExchangeTable(PDO $conn) {
    $query = "
        Create TABLE EXCHANGES (
            sender_user_id INT REFERENCES USERS(id),
            receiver_user_id INT REFERENCES USERS(id),
            content TEXT,
            file_path VARCHAR(250),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            Created_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (sender_user_id, receiver_user_id)
        );
    ";
    $conn->exec($query);
}