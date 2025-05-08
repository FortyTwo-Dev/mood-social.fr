<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function Unique(string $column, string $table, $value, string $message = "Already exists.", int $pdo_param = 2) {
    $query = "SELECT $column FROM " . $table . " WHERE ". $column ." = :value;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':value', $value, $pdo_param);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), $message, 'error');
    }
}

function Required(array $values): bool {
    foreach ($values as $value) {
        if(empty($value)) {
            ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
        }
    }

    return false;
}

function EmailExist() {

}