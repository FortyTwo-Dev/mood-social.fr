<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Dashboard/Profile/StoreRequest.php');
include_once($root . '/private/Request/Dashboard/Profile/DeleteRequest.php');

function Store() {

    $request = StoreValidation(); 

    $query = "INSERT INTO CUSTOMS (image, category, user_id) VALUES (:image, :category, :user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':image', $request['image']);
    $stmt->bindValue(':category', $request['category']);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    
    $stmt->execute();

    ToRoute('/dashboard/profil/', "image {$request['image']} ajoutée avec succès", 'success');
}

function Delete() {

    $request = DeleteValidation();
 
    $query = "DELETE FROM CUSTOMS WHERE id = :id";
     $stmt = Connection()->prepare($query);
 
     $stmt->bindValue(':id', $request['id'], PDO::PARAM_INT);
 
     $stmt->execute();
 
     ToRoute('/dashboard/profil/', "L'image a été supprimée définitivement avec succès", 'success');
 }