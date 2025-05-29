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

function GetAllUsersExcept(string $col, string $where, string $order = 'ORDER BY username ASC') {
    $query = "SELECT $col FROM USERS $where $order;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function CheckFriendExists(int $userId, int $friendId): bool {
    $query = "SELECT sender_user_id FROM FRIENDS WHERE (sender_user_id = :uid AND receiver_user_id = :fid) OR (sender_user_id = :fid AND receiver_user_id = :uid)";
    $stmt = Connection()->prepare($query);
    $stmt->execute(['uid' => $userId, 'fid' => $friendId]);
    return $stmt->fetchColumn() !== false;
}

function GetAllPendingFriendSend() {
    $query = "SELECT USERS.id, USERS.username FROM USERS JOIN FRIENDS ON FRIENDS.sender_user_id = USERS.id WHERE FRIENDS.receiver_user_id = :id AND FRIENDS.state = 1;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}