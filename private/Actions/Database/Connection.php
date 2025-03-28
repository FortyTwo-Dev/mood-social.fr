<?php

include_once($root . '/config/db.php');

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch(Exception $e) {
    die('Error' . $e->getMessage());
}