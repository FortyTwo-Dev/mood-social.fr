<?php
function CreateReactionTable(PDO $conn) {
    $query = "
        Create TABLE REACTIONS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            reaction VARCHAR(50),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            Created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}