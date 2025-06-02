<?php
require_once $root . '/private/Actions/Database/Database.php';
foreach (glob(__DIR__ . '/*Factory.php') as $file) {
    require_once $file;
}

function CreateAllTables(PDO $conn): bool {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        CreateRightTable($conn);
        CreateRoleTable($conn);
        CreateRoleRightTable($conn);
        CreateSubscriptionTable($conn);
        CreateUserTable($conn);
        CreateMoodTable($conn);
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
        CreateCaptchaTable($conn);
        CreateLogTable($conn);
        CreateNewsletterTable($conn);
        CreateCustomTable($conn);
        CreateUserCustomTable($conn);
        return true;

    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        return false;
    }
}

function DropAllTables(PDO $conn) {
    $conn->prepare('DROP TABLE IF EXISTS USER_CUSTOM, USER_EXCHANGE_REACTION, USER_MESSAGE_REACTION, MESSAGE_LIKES, EVENT_LIKES, USER_MOOD, USER_EVENT, USER_TALK, FRIENDS, FOLLOWERS, EXCHANGES, LOGS, NEWSLETTERS, CUSTOMS, CAPTCHAS, ROLE_RIGHT, MESSAGES, EVENTS, MOODS, REACTIONS, USERS, TALKS, SUBSCRIPTIONS, ROLES, RIGHTS;')->execute();
}

function ResetDatabase() {
    DropAllTables(Connection());
    print "All tables are delete.\n";
    sleep(1);
    CreateAllTables(Connection());
}