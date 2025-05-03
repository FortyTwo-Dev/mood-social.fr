<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetAllNewsletter(string $col) {
    $query = "SELECT {$col} FROM NEWSLETTERS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}