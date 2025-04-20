<?php
function CreateEventLikeTable(PDO $conn) {
    $query = "
        Create TABLE EVENT_LIKES (
            user_id INT REFERENCES USERS(id),
            event_id INT REFERENCES EVENTS(id),
            PRIMARY KEY (user_id, event_id)
        );
    ";
    $conn->exec($query);
}