<?php
function CreateRoleTable(PDO $conn) {
    $query = "
        Create TABLE ROLES (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
            created_at DATETIME DEFAULT NOW()
        );
    ";
    $conn->exec($query);
}