<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $allowedFilesTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $receiver_user_id = ValidatePost('receiver_user_id');
    $sender_user_id = GetUserId();
    $content = ValidatePost('content');

    if ($_FILES['image']['error'] != 4) {
    	$image = $_FILES['image'];
    }

    $filename = NULL;
    
    if ($_FILES['image']['error'] != 4) {
        FileExist('image');
    	FileMaxSize($image, 5);
    	AllowedFilesTypes($image, $allowedFilesTypes);
    }

    Required([$content, $receiver_user_id, $sender_user_id]);

    if ($_FILES['image']['error'] != 4) {
        $filename = UniqueFileName($image, 'exch_' . $sender_user_id . '_' . $receiver_user_id . '_');
    
        UploadFile($image, $_SERVER['DOCUMENT_ROOT'] . '/storage/exchange/' . $filename);
    }

    return [
        'receiver_user_id' => $receiver_user_id,
        'sender_user_id' => $sender_user_id,
        'content' => $content,
        'file_path' => $filename,
    ];
}
