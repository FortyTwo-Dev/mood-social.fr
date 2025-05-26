<?php
function CreateUserMessageReactionTable(PDO $conn) {
    $query = "
        Create TABLE USER_MESSAGE_REACTION (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            message_id INT REFERENCES MESSAGES(id) ON DELETE CASCADE,
            reaction_id INT REFERENCES REACTIONS(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, message_id, reaction_id)
        );
    ";
    $conn->exec($query);
}