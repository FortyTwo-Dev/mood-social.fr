<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetAllImages() {
    $query = "SELECT id, category FROM CUSTOMS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function GetImages(string $col) {
    $query = "SELECT {$col} FROM CUSTOMS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));
}
