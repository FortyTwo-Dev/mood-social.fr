<?php
function CreateUserTable(PDO $conn) {
    $query = "
        Create TABLE USERS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50),
            email VARCHAR(200) UNIQUE,
            password VARCHAR(255),
            profile_photo_path VARCHAR(255),
            state INT,
            visibility INT,
            street VARCHAR(100),
            city VARCHAR(50),
            country VARCHAR(50),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW(),
            role_id INT NOT NULL DEFAULT 1 REFERENCES ROLES(id) ON DELETE CASCADE,
            subscription_id INT NOT NULL DEFAULT 1 REFERENCES SUBSCRIPTIONS(id) ON DELETE CASCADE,
            subscription_updated_at INT CHECK(subscription_updated_at>=0),
            email_verified_at VARCHAR(255),
            email_verification_token VARCHAR(255),
            email_verification_expiration INT CHECK(email_verification_expiration>=0)
        );
    ";
    $conn->exec($query);
}