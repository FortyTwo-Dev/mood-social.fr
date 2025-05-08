<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['answer']);
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