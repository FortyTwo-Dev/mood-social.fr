<?php
function CreateUserEventTable(PDO $conn) {
    $query = "
        Create TABLE USER_EVENT (
            user_id INT REFERENCES USERS(id),
            event_id INT REFERENCES EVENTS(id),
            PRIMARY KEY (user_id, event_id)
        );
    ";
    $conn->exec($query);
}