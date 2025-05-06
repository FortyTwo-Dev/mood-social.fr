<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function UpdateValidation() {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
    $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

    $id = htmlspecialchars($_GET['id']);
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['answer']);
    $user_id = GetUserId();

    if(empty($title) OR empty($question) OR empty($answer) OR empty($content) OR empty($id)) {
        GoToRoute('/dashboard/security/captcha/create/', 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT title FROM CAPTCHAS WHERE title = :title;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        GoToRoute('/dashboard/security/captcha/create/', 'Le nom choisie existe déjà.', 'error');
    }

    return [
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'question' => $question,
        'answer' => $answer,
        'user_id' => $user_id
    ];
}