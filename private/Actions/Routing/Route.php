<?php
include_once($root . '/private/Actions/Cookie/Cookie.php');


function GoToRoute(string $url, string $message, string $message_type = 'info') {
    header('Location:' . $url);
    if ($message !== null) {
        SetFlashCookie('flash_message_' . $message_type, $message);
    }
}
