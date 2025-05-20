<?php
function CreateReactionTable(PDO $conn) {
    $query = "
        Create TABLE REACTIONS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            emoji TEXT,
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}