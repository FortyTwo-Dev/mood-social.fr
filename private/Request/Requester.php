<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function Required(array $values): bool {
    foreach ($values as $value) {
        if(empty($value)) {
            ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
        }
    }
    return false;
}

function Unique(string $column, string $table, $value, string $message = "Already exists.", int $pdo_param = 2) {
    $query = "SELECT $column FROM $table WHERE $column = :value;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':value', $value, $pdo_param);
    $stmt->execute();
    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), $message, 'error');
    }
}

function Exist(string $column, string $table, $value, string $message = "Does not exist.", int $pdo_param = 2) {
    $query = "SELECT $column FROM $table WHERE $column = :value;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':value', $value, $pdo_param);
    $stmt->execute();
    $assoc = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($assoc[$column] === $value) {
        ToRoute(Back(), $message, 'error');
    }
}

function ValidateEmail(string $email) {
    if (!empty($email) && strpos($email, '@') !== false) {
        $email  = explode('@', $email);
        $user   = $email[0];
        $domain = $email[1];
        if (count($email) === 2 && !empty($user) && !empty($domain) && checkdnsrr($domain)) {
            return true;
        }
    }
    ToRoute(Back(), 'L’adresse email saisie n’est pas valide.', 'error');
}

function ValidatePost(string $value, int $validate = FILTER_SANITIZE_FULL_SPECIAL_CHARS): string|int {
    return filter_input(INPUT_POST, $value, $validate);
}

function ValidateGet(string $value, int $validate = FILTER_SANITIZE_FULL_SPECIAL_CHARS): string|int {
    return filter_input(INPUT_GET, $value, $validate);
}