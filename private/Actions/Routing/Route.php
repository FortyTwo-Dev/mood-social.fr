<?php
include_once($root . '/private/Actions/Cookie/Cookie.php');
include_once($root . '/config/app.php');


function ToRoute(string $url, string $message = "empty", string $message_type = 'info') {
    header('Location:' . $url);
    if ($message !== "empty") {
        SetFlashCookie('flash_message_' . $message_type, $message);
    }
    die();
}

function Back(): string {
    return $_SERVER['HTTP_REFERER'];
}



function GenerateSignedRoute(string $token, string $url) {
    $signed_url = hash_hmac('sha256', $token, APP_KEY);
    return $url . 'token=' . $signed_url;
    die();
}
