<?php
include_once($root . '/config/app.php');

function RandomColor() : int {
    return rand(0,4);
}
