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

function UniqueExept(string $column, string $table, $value, string $exept_colum, string $exept_value, string $message = "Already exists.", int $pdo_param = 2) {
    $query = "SELECT $column FROM $table WHERE $column = :value AND $exept_colum <> :exept_value;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':value', $value, $pdo_param);
    $stmt->bindParam(':exept_value', $exept_value, $pdo_param);
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
    if (!empty($assoc)) {
        if ($assoc[$column] != $value) {
            ToRoute(Back(), $message, 'error');
        }
    }
    else {
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

function FileExist(string $name): bool {
    return isset($_FILES[$name]) && ($_FILES[$name]['error'] === UPLOAD_ERR_OK);
}

function FileMaxSize(array $file, int $size = 1): void {
    if ($file['size'] > $size * 1024 * 1024) {
        ToRoute(Back(), 'Le fichier fait plus de ' . $size . ' Mo', 'error');
    }
}

function AllowedFilesTypes(array $file, array $type): void {
    if (!in_array($file['type'], $type)) {
        ToRoute(Back(), 'Le fichier n\'est pas du bon type.', 'error');
    }
}

function UniqueFileName(array $file, string $prefix): string {

    return uniqid($prefix, true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
}

function UploadFile(array $file, string $path) {
    if (!move_uploaded_file($file['tmp_name'], $path)) {
        http_response_code(500);
        ToRoute(Back(), 'Erreur lors de l\'enregistrement', 'error');
    }
}

function Banned(string $email, string $message ='Banned.') {
    $query = "SELECT status FROM USERS WHERE email = :email AND status = 'banned'";
    $stmt = Connection()->prepare($query);
    $stmt->bindValue(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $banned_user = $stmt->fetch(PDO::FETCH_ASSOC);

 
    if (!empty($banned_user["status"]) ) {
        if ($banned_user["status"] == 'banned') {
            session_destroy();
            ToRoute('/auth/login/', $message, 'error');
            die();
        }
    } 
}