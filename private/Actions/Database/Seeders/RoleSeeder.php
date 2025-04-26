<?php
include_once($root . '/private/Actions/Database/Database.php');

function RoleSeeder(PDO $conn) {
    $roles = [
        [ 'name' => "default"],
        [ 'name' => "super_admin"],
        [ 'name' => "admin"],
    ];
    $query = "INSERT INTO ROLES (name) VALUES (:name)";
    $stmt = $conn->prepare($query);
    
    foreach ($roles as $role) {
        try {
    
            $stmt->bindParam(':name', $role['name']);
    
            $stmt->execute();
    
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le mood " . $role['name'] . ": " . $e->getMessage();
        }
    }
}