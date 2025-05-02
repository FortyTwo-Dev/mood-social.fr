<?php
include_once($root . '/private/Actions/Database/Database.php');

function SelectAuthUserWithEmail(string $col) {
    $query = "SELECT {$col} FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':email', GetEmail(), is_null(GetEmail()) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));
}

function SelectUserWithId(string $col) {
    $query = "SELECT {$col} FROM USERS WHERE id = :id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', $_GET['id'], is_null($_GET['id']) ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));
}

function GetAllUsers(string $col) {
    $query = "SELECT {$col} FROM USERS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetUsername(string $where = "email") {
    if ($where == "email") {
        return (SelectAuthUserWithEmail('username'))->username;
    }

    if ($where == "id") {
        return (SelectUserWithId('username'))->username;
    }
}

function GetUserId() {
    return ( isset($_SESSION['id']) ) ? $_SESSION['id'] : NULL;
}

function GetEmailVerifiedAt(string $where = "email") {
    if ($where == "email") {
        return (SelectAuthUserWithEmail('email_verified_at'))->email_verified_at;
    }

    if ($where == "id") {
        return (SelectUserWithId('email_verified_at'))->email_verified_at;
    }
}

function GetEmail() {
    return ( isset($_SESSION['email']) ) ? $_SESSION['email'] : NULL;
}


function GetMood() {
    
}

function GetLastUpdate(string $where = "email") {
    if ($where == "email") {
        return (SelectAuthUserWithEmail('updated_at'))->updated_at;
    }

    if ($where == "id") {
        return (SelectUserWithId('updated_at'))->updated_at;
    }
}

function GetCreatedDate(string $where = "email") {
    if ($where == "email") {
        return (SelectAuthUserWithEmail('created_at'))->created_at;
    }

    if ($where == "id") {
        return (SelectUserWithId('created_at'))->created_at;
    }
}
