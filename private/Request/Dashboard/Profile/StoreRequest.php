<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');


function StoreValidation()
{
    $image = $_FILES['image'];
    
    $category = ValidatePost('category');

    $user_id = GetUserId();
    Required([$category, $user_id]);
    

     if ($_FILES['image']['error'] == 0) {
        $filename = UniqueFileName($image, 'img_');

        UploadFile($image, $_SERVER['DOCUMENT_ROOT'] . '/storage/customs/' .$category . '/'. $filename);
    }


    
    return [
        'image' => $filename,
        'category' => $category,
        'user_id' => $user_id
    ];
}