<?php

include_once($root . '/private/Actions/Database/Database.php');

function DeleteUserByEmail($email) {
    $stmt = Connection()->prepare("DELETE FROM USERS WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
}