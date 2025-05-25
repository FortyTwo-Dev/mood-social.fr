<?php
include_once($root . '/private/Actions/Generic/Json.php');
include_once($root . '/private/Actions/Generic/Javascript.php');
require_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/Mood.php');

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

function SelectedColor() : array {

    if (GetMood() == "") {
        ToRoute('/mood/');
    }

    if (isset($_SESSION['mood'])) {
        return $_SESSION['mood'];
    }
    return RandomColor();
}

function ColorToJS(string $name, array $color) {
    return VariableToJS($name) . ToJson($color);
}