<?php
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Email/Email.php');
include_once($root . '/private/Actions/Database/Query/User.php');


function IsAuth(): bool {
    if (!empty($_SESSION['auth'])) {
        if ($_SESSION['auth'] == 1){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function IsAdmin(): bool {
    if (IsAuth()) {
        if ($_SESSION['role'] == 2){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    return false;
}

function EmailVerified(): bool {
    if (IsAuth()) {
        if (!GetEmailVerifiedAt() == null) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}