<?php
function CreateUserCustomTable(PDO $conn) {
    $query = "
        CREATE TABLE USER_CUSTOM (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            custom_id INT REFERENCES CUSTOMS(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, custom_id)
        );
    ";
    $conn->exec($query);
}