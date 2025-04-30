<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/Captcha/StoreRequest.php');
// include_once($root . '/private/Request/Captcha/UpdateRequest.php');
include_once($root . '/private/Actions/Routing/Route.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO CAPTCHAS (title, content, question, answer, user_id) VALUES (:title, :content, :question, :answer, :user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':title', $request['title']);
    $stmt->bindValue(':content', $request['content']);
    $stmt->bindValue(':question', $request['question']);
    $stmt->bindValue(':answer', $request['answer']);
    $stmt->bindValue(':user_id', $request['user_id']);
    
    $stmt->execute();

    GoToRoute('/dashboard/security/', "Captcha {$request['title']} créé avec succès", 'success');
}

// function Update() {

//     $request = UpdateValidation();

// }