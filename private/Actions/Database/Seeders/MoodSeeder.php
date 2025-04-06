<?php
include_once($root . '/private/Actions/Database/Connection.php');

$moods = [
    [ 'name' => "neutre", 'color' => "grey", 'text' => "white", ],
    [ 'name' => "joyeux", 'color' => "yellow", 'text' => "black", ],
    [ 'name' => "aigris", 'color' => "red", 'text' => "white", ],
    [ 'name' => "stressé", 'color' => "purple", 'text' => "white", ],
    [ 'name' => "triste", 'color' => "blue", 'text' => "black", ],
];

$query = "INSERT INTO MOODS (name, color, text_color) VALUES (:name, :color, :text_color)";
$stmt = Connection()->prepare($query);

foreach ($moods as $mood) {
    try {

        $stmt->bindParam(':name', $mood['name']);
        $stmt->bindParam(':color', $mood['color']);
        $stmt->bindParam(':text_color', $mood['text']);

        $stmt->execute();

    } catch (Exception $e) {
        echo "Erreur lors de l'insertion pour le mood " . $mood['name'] . ": " . $e->getMessage();
    }
}