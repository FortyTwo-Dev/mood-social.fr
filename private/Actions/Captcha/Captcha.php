<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Captcha/StoreRequest.php');
include_once($root . '/private/Request/Captcha/UpdateRequest.php');
include_once($root . '/private/Request/Captcha/DeleteRequest.php');

function Store() {

    $request = StoreValidation();

    $query = "INSERT INTO CAPTCHAS (title, content, question, answer, user_id) VALUES (:title, :content, :question, :answer, :user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':title', $request['title']);
    $stmt->bindValue(':content', $request['content']);
    $stmt->bindValue(':question', $request['question']);
    $stmt->bindValue(':answer', $request['answer']);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute('/dashboard/security/', "Captcha {$request['title']} créé avec succès", 'success');
}

function Update() {

   $request = UpdateValidation();

   $query = "UPDATE CAPTCHAS SET title = :title, content = :content, question = :question, answer = :answer, user_id = :user_id WHERE id = :id";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':id', $request['id'], PDO::PARAM_INT);
    $stmt->bindValue(':title', $request['title']);
    $stmt->bindValue(':content', $request['content']);
    $stmt->bindValue(':question', $request['question']);
    $stmt->bindValue(':answer', $request['answer']);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);

    $stmt->execute();

    ToRoute('/dashboard/security/', "Captcha {$request['title']} modifié avec succès", 'success');
}

function Delete() {

    $request = DeleteValidation();
 
    $query = "DELETE FROM CAPTCHAS WHERE id = :id";
     $stmt = Connection()->prepare($query);
 
     $stmt->bindValue(':id', $request['id'], PDO::PARAM_INT);
 
     $stmt->execute();
 
     ToRoute('/dashboard/security/', "Le captcha a été supprimée définitivement avec succès", 'success');
 }