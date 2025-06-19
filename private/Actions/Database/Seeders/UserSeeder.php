<?php
include_once($root . '/private/Actions/Database/Database.php');

function UserSeeder(PDO $conn) {
    $users = [
        [ 'username' => "FortyTwo_dev", 'email' => "the.fortytwo_dev@proton.me", 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ],
        [ 'username' => "jikuji", 'email' => "lefortjiji@gmail.com", 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ],
        [ 'username' => "adems93", 'email' =>"adamgalou938@gmail.com" , 'password' => "password", 'role_id' => 2, 'subscription_id' => 2 ],
        [ 'username' => "MoodBot", 'email' =>"moodsocial.contact@gmail.com" , 'password' => "", 'role_id' => 2, 'subscription_id' => 2 ]
    ];
    $query = "INSERT INTO USERS (username, email, password, role_id, subscription_id, email_verified_at) VALUES (:username, :email, :password, :role_id, :subscription_id, :email_verified_at)";
    $stmt = $conn->prepare($query);
    
    foreach ($users as $user) {
        try {
            $emailVerifiedAt = date('Y-m-d H:i:s');
            $stmt->bindParam(':username', $user['username']);
            $stmt->bindParam(':email', $user['email']);
            $stmt->bindValue(':password', password_hash($user['password'], PASSWORD_ARGON2ID));
            $stmt->bindParam(':role_id', $user['role_id'], PDO::PARAM_INT);
            $stmt->bindParam(':subscription_id', $user['subscription_id'], PDO::PARAM_INT);
            $stmt->bindParam(':email_verified_at', $emailVerifiedAt);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le user " . $user['username'] . ": " . $e->getMessage();
        }
    }
}