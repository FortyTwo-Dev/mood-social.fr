<?php
include_once($root . '/private/Actions/Database/Database.php');

function SelectAuthUserWithEmail(string $col) {
    $query = "SELECT $col FROM USERS WHERE email = :email";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':email', GetEmail(), is_null(GetEmail()) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));
}

function SelectUserWithId(string $col) {
    $query = "SELECT $col FROM USERS WHERE id = :id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), is_null(GetUserId()) ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));
}

function GetAllUsers(string $col) {
    $query = "SELECT $col FROM USERS";
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

function GetUserWithId(string $col, int $id) {
    $query = "SELECT $col FROM USERS WHERE id = :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', $id, is_null($id) ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->execute();
    return ($stmt->fetch(PDO::FETCH_OBJ));

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

function CheckFriendExists(int $user_id, int $friend_id): bool {
    $query = "SELECT sender_user_id FROM FRIENDS WHERE (sender_user_id = :uid AND receiver_user_id = :fid) OR (sender_user_id = :fid AND receiver_user_id = :uid)";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':uid', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':fid', $friend_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() !== false;
}

function CheckExhangeExists(int $user_id, int $friend_id): bool {
    $query = "SELECT sender_user_id FROM EXCHANGES WHERE (sender_user_id = :uid AND receiver_user_id = :fid) OR (sender_user_id = :fid AND receiver_user_id = :uid)";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':uid', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':fid', $friend_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() !== false;
}

function GetAllPendingFriendSend() {
    $query = "SELECT USERS.id, USERS.username FROM USERS JOIN FRIENDS ON FRIENDS.sender_user_id = USERS.id WHERE FRIENDS.receiver_user_id = :id AND FRIENDS.state = 1;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function GetAllAcceptFriend() {
    $query = "SELECT USERS.id, USERS.username FROM USERS 
    JOIN FRIENDS ON ((FRIENDS.sender_user_id = USERS.id AND FRIENDS.receiver_user_id = :id) 
    OR (FRIENDS.receiver_user_id = USERS.id AND FRIENDS.sender_user_id = :id)) 
    WHERE FRIENDS.state = 2 AND USERS.id <> :id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function GetUserProfile(int $user_id) {
    $query = "SELECT USERS.id, USERS.username, USERS.description, 
    (SELECT COUNT(sender_user_id) FROM FOLLOWERS WHERE sender_user_id = USERS.id AND state = 2) AS followed,
    (SELECT COUNT(receiver_user_id) FROM FOLLOWERS WHERE receiver_user_id = USERS.id AND state = 2) AS follower,
    (SELECT sender_user_id FROM FOLLOWERS WHERE sender_user_id = :current_user_id AND receiver_user_id = USERS.id AND state = 2) AS isfollower,
    (SELECT sender_user_id FROM FOLLOWERS WHERE sender_user_id = :current_user_id AND receiver_user_id = USERS.id AND state = 1) AS pendingfollower,
    (SELECT sender_user_id FROM FOLLOWERS WHERE sender_user_id = :current_user_id AND receiver_user_id = USERS.id AND state = 0) AS nofollower,
    (SELECT sender_user_id FROM FRIENDS WHERE (sender_user_id = :current_user_id AND receiver_user_id = USERS.id) OR (sender_user_id = USERS.id AND receiver_user_id = :current_user_id) AND state = 2) AS isfriend,
    (SELECT sender_user_id FROM FRIENDS WHERE (sender_user_id = :current_user_id AND receiver_user_id = USERS.id) OR (sender_user_id = USERS.id AND receiver_user_id = :current_user_id) AND state = 1) AS pendingfriend,
    (SELECT sender_user_id FROM FRIENDS WHERE (sender_user_id = :current_user_id AND receiver_user_id = USERS.id) OR (sender_user_id = USERS.id AND receiver_user_id = :current_user_id) AND state = 0) AS nofriend
    FROM USERS WHERE USERS.id = :user_id;";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':current_user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}