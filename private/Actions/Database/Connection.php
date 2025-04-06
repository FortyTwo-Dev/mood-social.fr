<?php
include_once($root . '/config/db.php');

function Connection() {
    try {
        return new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8", USERNAME, PASSWORD);
    }
    catch(Exception $e) {
        die('Error' . $e->getMessage());
    }
}

