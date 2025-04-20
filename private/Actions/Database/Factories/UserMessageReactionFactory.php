<?php
function CreateUserMessageReactionTable(PDO $conn) {
    $query = "
        Create TABLE USER_MESSAGE_REACTION (
            user_id INT REFERENCES USERS(id),
            message_id INT REFERENCES MESSAGES(id),
            reaction_id INT REFERENCES REACTIONS(id),
            PRIMARY KEY (user_id, message_id, reaction_id)
        );
    ";
    $conn->exec($query);
}