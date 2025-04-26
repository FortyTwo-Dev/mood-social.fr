<?php
function CreateMoodTable(PDO $conn) {
    $query = "
        Create TABLE MOODS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20),
            color VARCHAR(10),
            text_color VARCHAR(10),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}