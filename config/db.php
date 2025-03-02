<?php
$servername = "mysql"; // Nom du service MySQL dans docker-compose
$username = "user"; // Nom d'utilisateur MySQL
$password = "password"; // Mot de passe MySQL
$dbname = "db"; // Nom de la base de données

try {
    // Créer la connexion avec PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Définir le mode d'erreur de PDO à Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de données!";
}
catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
?>