<?php
function CreateMessageTable(PDO $conn) {
    $query = "
        Create TABLE MESSAGES (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content TEXT,
            path VARCHAR(255),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            user_id INT NOT NULL REFERENCES USERS(id) ON DELETE CASCADE,
            talk_id INT NOT NULL REFERENCES TALKS(id) ON DELETE CASCADE
        );
    ";
    $conn->exec($query);
}