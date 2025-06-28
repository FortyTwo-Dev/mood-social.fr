<?php
$root = __DIR__ . '/../';
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Seeders/Seeder.php');
include_once($root . '/private/Actions/Database/Factories/Factory.php');
include_once($root . '/private/Actions/Logs/Logs.php');


if (CreateAllTables(Connection())) {
    echo "SeedAllTable Start\n";
    SeedAllTable();
    echo "SeedAllTable Finish\n";
} else {
    echo "Base de données déjà initialiser ou la base de données : " . DBNAME . " n'existe pas.CREATE DATABASE " . DBNAME . ";\n";
}

$chemin = $root . "storage/feed/";

$folders = [
    "storage/feed/",
    "storage/exchange/",
    "storage/customs/",
    "storage/customs/beard/",
    "storage/customs/hat/",
    "storage/customs/head",
];

foreach ($folders as $relativePath) {
    $fullPath = $root . $relativePath;

    if (!file_exists($fullPath)) {
        if (mkdir($fullPath, 0755, true)) {
            echo "The directory '$fullPath' was successfully created.\n";
        } else {
            echo "Failed to create the directory '$fullPath'.\n";
        }
    } else {
        echo "The directory '$fullPath' already exists.\n";
    }
}


?>