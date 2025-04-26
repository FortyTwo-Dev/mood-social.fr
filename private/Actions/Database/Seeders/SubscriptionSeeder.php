<?php
include_once($root . '/private/Actions/Database/Database.php');

function SubscriptionSeeder(PDO $conn) {
    $subscriptions = [
        [ 'title' => "MoodSocial", 'type' => "moodsocial_free_1"],
        [ 'title' => "MoodSocial+", 'type' => "moodsocial_paid_1"],
    ];
    $query = "INSERT INTO SUBSCRIPTIONS (title, type) VALUES (:title, :type)";
    $stmt = $conn->prepare($query);
    
    foreach ($subscriptions as $subscription) {
        try {
    
            $stmt->bindParam(':title', $subscription['title']);
            $stmt->bindParam(':type', $subscription['type']);
    
            $stmt->execute();
    
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le mood " . $subscription['title'] . ": " . $e->getMessage();
        }
    }
}