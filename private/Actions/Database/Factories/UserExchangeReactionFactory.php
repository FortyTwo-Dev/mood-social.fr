<?php
function CreateUserExchangeReactionTable(PDO $conn) {
    $query = "
        Create TABLE USER_EXCHANGE_REACTION (
            user_id INT REFERENCES USERS(id),
            exchange_id INT REFERENCES EXCHANGES(id),
            reaction_id INT REFERENCES REACTIONS(id),
            PRIMARY KEY (user_id, exchange_id, reaction_id)
        );
    ";
    $conn->exec($query);
}