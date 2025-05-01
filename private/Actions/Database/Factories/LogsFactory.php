<?php
function CreateLogsTable(PDO $conn) {
    $query = "
        CREATE TABLE LOGS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            status VARCHAR(4)
            message TEXT,
            ip VARCHAR(45)
            action_type VARCHAR(100),
            requested_at DATETIME DEFAULT NOW(),
            user_id INT NULL REFERENCES USERS(id),
        );
    ";
    $conn->exec($query);
}