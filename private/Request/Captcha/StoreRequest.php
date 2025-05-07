<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['answer']);
    $user_id = GetUserId();

    if(empty($title) OR empty($question) OR empty($answer) OR empty($content)) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT title FROM CAPTCHAS WHERE title = :title;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), 'Le nom choisie existe déjà.', 'error');
    }

    return [
        'title' => $title,
        'content' => $content,
        'question' => $question,
        'answer' => $answer,
        'user_id' => $user_id
    ];
}