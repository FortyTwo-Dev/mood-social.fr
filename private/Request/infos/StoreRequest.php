<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function UpdateUserValidation() {
    $state = ValidatePost('state'); 
    $visibility = ValidatePost('visibility');
    $street = ValidatePost('street');
    $city = ValidatePost('city');
    $country = ValidatePost('country');
    $user_id = GetUserId(); 

    Required([$state, $visibility, $street, $city, $country]);

    return [
        'state' => $state, 
        'visibility' => match(strtolower($visibility)) {
            'public' => 1,
            'private' => 0,
            default => throw new Exception("Visibilité invalide"),// il ma dit de rajouter ça 
        },
        'street' => $street,
        'city' => $city,
        'country' => $country,
        'user_id' => $user_id
    ];
}
