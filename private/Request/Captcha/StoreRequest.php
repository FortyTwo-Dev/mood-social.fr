<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $title = ValidatePost('title');
    $content = ValidatePost('content');
    $question = ValidatePost('question');
    $answer = ValidatePost('answer');
    $user_id = GetUserId();

    Required([$title, $question, $answer, $content, $user_id]);

    Unique("title", "CAPTCHAS", $title, "Le nom choisie existe déjà.");

    return [
        'title' => $title,
        'content' => $content,
        'question' => $question,
        'answer' => $answer,
        'user_id' => $user_id
    ];
}