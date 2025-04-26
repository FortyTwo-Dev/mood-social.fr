<?php
include_once($root . '/private/Actions/Cookie/Cookie.php');


function GoToRoute(string $url, string $message = "empty", string $message_type = 'info') {
    header('Location:' . $url);
    if ($message !== "empty") {
        SetFlashCookie('flash_message_' . $message_type, $message);
    }
    die();
}
