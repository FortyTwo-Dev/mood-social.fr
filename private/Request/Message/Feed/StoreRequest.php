<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $allowedFilesTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $content = ValidatePost('content');
    $user_id = GetUserId();
    $image = $_FILES['image'];

    FileExist('image');
    FileMaxSize($image, 5);
    AllowedFilesTypes($image, $allowedFilesTypes);
    Required([$content, $user_id]);

    $filename = UniqueFileName($image, 'feed_' . $user_id . '_');

    UploadFile($image, $_SERVER['DOCUMENT_ROOT'] . '/storage/feed/' . $filename);

    return [
        'content' => $content,
        'path' => $filename,
        'user_id' => $user_id
    ];
}