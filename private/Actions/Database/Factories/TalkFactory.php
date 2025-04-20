<?php
function CreateTalkTable(PDO $conn) {
    $query = "
        Create TABLE TALKS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100),
            type VARCHAR(50),
            description VARCHAR(255),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            Created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}