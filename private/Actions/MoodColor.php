<?php
// include_once($root . '/config/app.php');
include_once($root . '/private/Actions/Generic/Json.php');
include_once($root . '/private/Actions/Generic/Javascript.php');
require_once($root . '/private/Actions/Database/Connection.php');

function RandomColor() : array {

    $moods = GetAllColor();

    return $moods[rand(0,4)];
}

function GetAllColor() : array {

    $query = "SELECT name, color, text_color FROM MOODS";
    $stmt = Connection()->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ColorToJS(string $name, array $color) {
    return VariableToJS($name) . ToJson($color);
}