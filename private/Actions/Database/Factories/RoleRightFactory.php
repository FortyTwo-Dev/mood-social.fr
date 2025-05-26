<?php
function CreateRoleRightTable(PDO $conn) {
    $query = "
        Create TABLE ROLE_RIGHT (
            role_id INT REFERENCES ROLES(id) ON DELETE CASCADE,
            right_id INT REFERENCES RIGHTS(id) ON DELETE CASCADE,
            PRIMARY KEY (role_id, right_id)
        );
    ";
    $conn->exec($query);
}