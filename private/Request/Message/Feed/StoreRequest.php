<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation()
{

    $allowedFilesTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $content = ValidatePost('content');
    $user_id = GetUserId();

    $filename = NULL;

    Required([$content, $user_id]);

    if (FileExist('drawing')) {
        $image = $_FILES['drawing'];
    } else {
        if (FileExist('image')) {
            $image = $_FILES['image'];
        }
    }

    if (FileExist('drawing')) {
        FileMaxSize($image, 5);
        AllowedFilesTypes($image, $allowedFilesTypes);
    } else {
        if (FileExist('image')) {
            FileMaxSize($image, 5);
            AllowedFilesTypes($image, $allowedFilesTypes);
        }
    }

    if (FileExist('drawing')) {
        $filename = UniqueFileName($image, 'draw_' . $user_id . '_');

        UploadFile($image, $_SERVER['DOCUMENT_ROOT'] . '/storage/feed/' . $filename);
    } else {
        if (FileExist('image')) {
            $filename = UniqueFileName($image, 'feed' . $user_id . '');

            UploadFile($image, $_SERVER['DOCUMENT_ROOT'] . '/storage/feed/' . $filename);
        }
    }

    return [
        'content' => $content,
        'path' => $filename,
        'user_id' => $user_id
    ];
}
