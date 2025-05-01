<?php
require_once $root . '/private/Actions/Database/Database.php';
foreach (glob(__DIR__ . '/*Factory.php') as $file) {
    require_once $file;
}

function CreateAllTables(PDO $conn): bool {
    try {
        CreateRightTable($conn);
        CreateRoleTable($conn);
        CreateRoleRightTable($conn);
        CreateSubscriptionTable($conn);
        CreateUserTable($conn);
        CreateTalkTable($conn);
        CreateEventTable($conn);
        CreateMessageTable($conn);
        CreateMessageLikeTable($conn);
        CreateReactionTable($conn);
        CreateUserMessageReactionTable($conn);
        CreateFriendTable($conn);
        CreateFollowerTable($conn);
        CreateExchangeTable($conn);
        CreateUserExchangeReactionTable($conn);
        CreateUserTalkTable($conn);
        CreateUserEventTable($conn);
        CreateUserMoodTable($conn);
        CreateEventLikeTable($conn);
        CreateMoodTable($conn);
        CreateCaptchaTable($conn);
        CreateLogsTable($conn);
        return true;

    } catch (PDOException $e) {
        return false;
    }
}

function DropAllTables(PDO $conn) {
    $conn->prepare('DROP TABLE CAPTCHAS, EVENTS, EVENT_LIKES, EXCHANGES, FOLLOWERS, FRIENDS, MESSAGES, MESSAGE_LIKES, MOODS, REACTIONS, RIGHTS, ROLES, ROLE_RIGHT, SUBSCRIPTIONS, TALKS, USERS, USER_EVENT, USER_EXCHANGE_REACTION, USER_MESSAGE_REACTION, USER_MOOD, USER_TALK;')->execute();
}

function ResetDatabase() {
    $conn = Connection();
    DropAllTables($conn);
    CreateAllTables($conn);
}