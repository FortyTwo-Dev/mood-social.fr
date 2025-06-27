<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/Event.php');

include_once($root . '/private/Request/Event/StoreRequest.php');
include_once($root . '/private/Request/Event/ShowRequest.php');
include_once($root . '/private/Request/Event/AttendRequest.php');
include_once($root . '/private/Request/Event/LeaveRequest.php');

function Store() {

    $request = StoreValidation();
    $db = Connection();
    $query = "INSERT INTO TALKS (title, description, type) VALUES (:title, :description, 'Public')";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':title', $request['title']);
    $stmt->bindValue(':description', $request['description']);
    
    $stmt->execute();

    $talk_id = $db->lastInsertId();

    $query = "INSERT INTO EVENTS (title, description, talk_id) VALUES (:title, :description, :talk_id)";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':title', $request['title']);
    $stmt->bindValue(':description', $request['description']);
    $stmt->bindValue(':talk_id', $talk_id, PDO::PARAM_INT);
    
    $stmt->execute();

    $event_id = $db->lastInsertId();

    $query = "INSERT INTO USER_EVENT (user_id, event_id) VALUES (:user_id, :event_id)";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);
    
    $stmt->execute();

    $query = "INSERT INTO USER_TALK (user_id, talk_id) VALUES (:user_id, :talk_id)";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':talk_id', $talk_id, PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back(), "Évènement {$request['title']} créé avec succès", 'success');
}

function Index() {

    return [
        'events' => GetAllEvents('id, title, description'),
    ];
}

function Show() {
    $request = ShowValidation();

    return [
        'event' => GetEvent('id, title, description', $request['id']),
        'user_event' => UserHaveAttendEvent(GetUserId()),
        'users' => $request['users']
    ];
}

function Attend() {
    $request = AttendValidation();

    $query = "INSERT INTO USER_EVENT (user_id, event_id) VALUES (:user_id, :event_id)";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':event_id', $request['event_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    $query = "INSERT INTO USER_TALK (user_id, talk_id) VALUES (:user_id, :talk_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':talk_id', $request['talk_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}

function Leave() {
    $request = LeaveValidation();
    
    $query = "DELETE FROM USER_EVENT WHERE event_id = :event_id AND user_id = :user_id";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':event_id', $request['event_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    $query = "DELETE FROM USER_TALK WHERE talk_id = :talk_id AND user_id = :user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', GetUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':talk_id', $request['talk_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute(Back());
}