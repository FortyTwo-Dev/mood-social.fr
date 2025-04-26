<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetUsername() {
    $query = "SELECT username FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', GetEmail());
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ))->username;
}

function GetEmail() {
    return $_SESSION['email'];
}

function GetEmailVerifiedAt() {
    $query = "SELECT email_verified_at FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', GetEmail());
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ))->email_verified_at;
}

function GetMood() {
    
}

function GetLastUpdate() {
    $query = "SELECT updated_at FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', GetEmail());
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ))->updated_at;
}

function GetCreatedDate() {
    $query = "SELECT created_at FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':email', GetEmail());
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ))->created_at;
}
