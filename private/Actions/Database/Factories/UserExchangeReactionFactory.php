<?php
function CreateUserExchangeReactionTable(PDO $conn) {
    $query = "
        Create TABLE USER_EXCHANGE_REACTION (
            user_id INT REFERENCES USERS(id) ON DELETE CASCADE,
            exchange_id INT REFERENCES EXCHANGES(id) ON DELETE CASCADE,
            reaction_id INT REFERENCES REACTIONS(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, exchange_id, reaction_id)
        );
    ";
    $conn->exec($query);
}