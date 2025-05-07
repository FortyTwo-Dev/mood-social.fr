<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $object = filter_input(INPUT_POST, 'object', FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);

    $user_id = GetUserId();

    if(empty($object) OR empty($title) OR empty($content)) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    if(empty($action) OR empty($url)) {
        $action = "";
        $url = "";
    }

    $query = "SELECT object FROM NEWSLETTERS WHERE object = :object;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':object', $object);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), 'L\'object existe déjà.', 'error');
    }

    return [
        'object' => $object,
        'title' => $title,
        'content' => $content,
        'action' => $action,
        'url' => $url,
        'user_id' => $user_id
    ];
}