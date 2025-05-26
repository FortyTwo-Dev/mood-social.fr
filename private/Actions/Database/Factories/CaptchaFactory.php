<?php
function CreateCaptchaTable(PDO $conn) {
    $query = "
        Create TABLE CAPTCHAS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50),
            content VARCHAR(50),
            question VARCHAR(200),
            answer VARCHAR(200),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            user_id INT NOT NULL REFERENCES USERS(id) ON DELETE CASCADE
        );
    ";
    $conn->exec($query);
}