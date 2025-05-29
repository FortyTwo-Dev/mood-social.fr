<?php
include_once($root . '/private/Actions/Database/Database.php');

function UserSeeder(PDO $conn) {
    $users = [
        [ 'username' => "FortyTwo_dev", 'email' => "the.fortytwo_dev@proton.me", 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ],
        [ 'username' => "jikuji", 'email' => "lefortjiji@gmail.com", 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ],
        [ 'username' => "adems93", 'email' =>"adamgalou938@gmail.com" , 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ]
    ];
    $query = "INSERT INTO USERS (username, email, password, role_id, subscription_id) VALUES (:username, :email, :password, :role_id, :subscription_id)";
    $stmt = $conn->prepare($query);
    
    foreach ($users as $user) {
        try {
            $stmt->bindParam(':username', $user['username']);
            $stmt->bindParam(':email', $user['email']);
            $stmt->bindValue(':password', password_hash($user['password'], 'argon2id'));
            $stmt->bindParam(':role_id', $user['role_id'], PDO::PARAM_INT);
            $stmt->bindParam(':subscription_id', $user['subscription_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le user " . $user['username'] . ": " . $e->getMessage();
        }
    }
}