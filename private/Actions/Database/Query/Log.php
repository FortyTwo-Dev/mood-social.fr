<?php
include_once($root . '/private/Actions/Database/Database.php');

function GetAllLogs(string $col) {
    $query = "SELECT {$col} FROM LOGS";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return ($stmt->fetchAll(PDO::FETCH_OBJ));
}

function GetStatusOccurrences() {
    $query = "
        SELECT status, COUNT(status) AS occurrences
        FROM LOGS
        GROUP BY status
        ORDER BY occurrences DESC
    ";
    $stmt = Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function GetCaptchaId() {

}

function GetCaptchaMood() {
    
}

function GetCaptchaLastUpdate() {

}

function GetCaptchaCreatedDate() {

}
