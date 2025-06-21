<?php
function CreateCustomTable(PDO $conn) {
    $query = "
        CREATE TABLE CUSTOMS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            image VARCHAR(255),
            category VARCHAR(50),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            user_id INT NOT NULL REFERENCES USERS(id) ON DELETE CASCADE
        );
    ";
    $conn->exec($query);
}