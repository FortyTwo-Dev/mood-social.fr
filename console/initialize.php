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
?>