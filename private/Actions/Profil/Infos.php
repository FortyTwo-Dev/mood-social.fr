<?php 
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/infos/StoreRequest.php');


function UpdateUser() {
    $data = UpdateUserValidation();

    $query = "UPDATE USERS SET 
        state = :state, 
        visibility = :visibility,
        street = :street,
        city = :city,
        country = :country,
        updated_at = NOW()
        WHERE id = :user_id";

    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':state', $data['state'], PDO::PARAM_INT);
    $stmt->bindValue(':visibility', $data['visibility'], PDO::PARAM_INT);
    $stmt->bindValue(':street', $data['street']);
    $stmt->bindValue(':city', $data['city']);
    $stmt->bindValue(':country', $data['country']);
    $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);

    $stmt->execute();

    ToRoute('/account/infos/show/', 'Informations mises à jour avec succès', 'success');
}
