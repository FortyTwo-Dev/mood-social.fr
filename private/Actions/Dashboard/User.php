<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Dashboard/User/ShowRequest.php');

function Show() {

    $request = ShowValidation();

    $user = GetUserWithId(
    'username, email, state, street, city, country, description, updated_at, created_at, email_verified_at, status, banned_until, ban_start, ban_duration, ban_reason',$request['user_id']);

    $moods = GetAllUserMood($request['user_id']);

    $current_mood = GetMood($request['user_id']);

    $stats = [
        'friend' => GetFriendNumber($request['user_id']),
        'follower' => GetFollowerNumber($request['user_id']),
        'subscription' => GetUserSubscription($request['user_id'])
    ];

    return [
        'user' => $user,
        'moods' => $moods,
        'current_mood' => $current_mood,
        'stats' => $stats
    ];
}