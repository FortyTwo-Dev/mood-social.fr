<?php
function CreateLogsTable(PDO $conn) {
    $query = "
        CREATE TABLE LOGS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            status VARCHAR(4),
            ip VARCHAR(45),
            requested_at DATETIME DEFAULT NOW(),
            user_id INT NULL REFERENCES USERS(id),
            script_name VARCHAR(255),
            http_referer VARCHAR(255),
            request_uri VARCHAR(255),
            request_method VARCHAR(255),
            server_protocol VARCHAR(255),
            http_user_agent VARCHAR(255)
        );
    ";
    $conn->exec($query);
}