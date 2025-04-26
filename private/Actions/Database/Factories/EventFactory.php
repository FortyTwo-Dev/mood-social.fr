<?php
function CreateEventTable(PDO $conn) {
    $query = "
        Create TABLE EVENTS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100),
            description VARCHAR(255),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            talk_id INT UNIQUE NOT NULL REFERENCES TALKS(id)
        );
    ";
    $conn->exec($query);
}