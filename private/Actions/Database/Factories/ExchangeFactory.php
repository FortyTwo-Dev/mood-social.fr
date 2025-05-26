<?php
function CreateExchangeTable(PDO $conn) {
    $query = "
        Create TABLE EXCHANGES (
            sender_user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            receiver_user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            content TEXT,
            file_path VARCHAR(250),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            PRIMARY KEY (sender_user_id, receiver_user_id)
        );
    ";
    $conn->exec($query);
}