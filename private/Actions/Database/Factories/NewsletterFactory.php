<?php
function CreateNewsletterTable(PDO $conn) {
    $query = "
        CREATE TABLE NEWSLETTERS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            object VARCHAR(255),
            content TEXT,
            created_at DATETIME DEFAULT NOW(),
            user_id INT NOT NULL REFERENCES USERS(id)
        )
    ";
    $conn->exec($query);
}