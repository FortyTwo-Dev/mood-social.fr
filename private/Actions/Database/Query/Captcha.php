<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetAllCaptchas(string $col) {
    $query = "SELECT {$col} FROM CAPTCHAS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetCaptchaTitle() {

}

function GetCaptchaId() {

}

function GetCaptchaMood() {
    
}

function GetCaptchaLastUpdate() {

}

function GetCaptchaCreatedDate() {

}
