<?php

function SetFlashCookie(string $name, string $message = '') {
    setcookie($name, $message, time() + 1, '/', "", true);
}
