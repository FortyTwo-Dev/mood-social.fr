<?php
function MethodVerify($Method_Use, $error_message="error") : bool {

    if ($Method_Use === NULL || $Method_Use === "") {
        header('Location: /errors/500/?error_message=method null');
        echo "Il faut définir une methode à vérifier";
        die();
        return false;
    }
    
    if ($_SERVER['REQUEST_METHOD'] !== $Method_Use) {
        header("Location: /errors/500/?error_message=$error_message");
        die();
        return false;
    }
    return true;
}

