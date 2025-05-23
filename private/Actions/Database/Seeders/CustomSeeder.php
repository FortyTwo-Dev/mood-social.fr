<?php
include_once($root . '/private/Actions/Database/Database.php');

function CustomSeeder(PDO $conn) {
    $customs = [

        [ 'image' => "cat.png", 'category' => "head", 'user_id' => "2"],
        [ 'image' => "dog.png", 'category' => "head", 'user_id' => "2"],
        [ 'image' => "panda.png", 'category' => "head", 'user_id' => "2"],

        [ 'image' => "barbe_noel.png", 'category' => "beard", 'user_id' => "2"],
        [ 'image' => "barbe_rue.png", 'category' => "beard", 'user_id' => "2"],
        [ 'image' => "moustache.png", 'category' => "beard", 'user_id' => "2"],

        [ 'image' => "study_hat.png", 'category' => "hat", 'user_id' => "2"],
        [ 'image' => "hard.png", 'category' => "hat", 'user_id' => "2"],
        [ 'image' => "chef.png", 'category' => "hat", 'user_id' => "2"],

    ];
    $query = "INSERT INTO CUSTOMS (image, category, user_id) VALUES (:image, :category, :user_id)";
    $stmt = $conn->prepare($query);
    
    foreach ($customs as $custom) {
        try {
    
            $stmt->bindParam(':image', $custom['image']);
            $stmt->bindParam(':category', $custom['category']);
            $stmt->bindValue(':user_id', $custom['user_id'], PDO::PARAM_INT);
    
            $stmt->execute();
    
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le custom " . $custom['image'] . ": " . $e->getMessage();
        }
    }
}