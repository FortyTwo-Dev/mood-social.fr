<?php
include_once($root . '/private/Actions/Database/Database.php');

function TalkSeeder(PDO $conn) {
    $talks = [
        [ 'title' => "Feed General", 'type' => "Public", 'description' =>  "Feed general"],
    ];
    $query = "INSERT INTO TALKS (title, type, description) VALUES (:title, :type, :description)";
    $stmt = $conn->prepare($query);
    
    foreach ($talks as $talk) {
        try {
    
            $stmt->bindParam(':title', $talk['title']);
            $stmt->bindParam(':type', $talk['type']);
            $stmt->bindParam(':description', $talk['description']);
    
            $stmt->execute();
    
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour la discution " . $talk['title'] . ": " . $e->getMessage();
        }
    }
}