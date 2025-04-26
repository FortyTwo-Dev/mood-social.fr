<?php
function CreateSubscriptionTable(PDO $conn) {
    $query = "
        Create TABLE SUBSCRIPTIONS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50),
            type VARCHAR(50),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}