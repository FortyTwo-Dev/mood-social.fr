<?php
function CreateRoleRightTable(PDO $conn) {
    $query = "
        Create TABLE ROLE_RIGHT (
            role_id INT REFERENCES ROLES(id),
            right_id INT REFERENCES RIGHTS(id),
            PRIMARY KEY (role_id, right_id)
        );
    ";
    $conn->exec($query);
}