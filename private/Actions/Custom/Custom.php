<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Request/Custom/StoreRequest.php');



function Store()
{
    $request = StoreValidation();

    Delete($request);

    $query = "INSERT IGNORE INTO USER_CUSTOM (user_id, custom_id) VALUES (:user_id, :custom_id);";

    foreach ($request['customs'] as $custom_id) {
        if (!empty($custom_id)) {

            $stmt = Connection()->prepare($query);

            $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
            $stmt->bindValue(':custom_id', $custom_id, PDO::PARAM_INT);

            $stmt->execute();
        }
    }
    ToRoute(Back());
}


function Delete(array $request)
{
    $query = "DELETE FROM USER_CUSTOM WHERE user_id = :user_id;";

    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);

    $stmt->execute();
}