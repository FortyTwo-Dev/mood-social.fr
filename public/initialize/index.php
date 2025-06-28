<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = 'MoodSocial';
include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/Security/User.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Seeders/Seeder.php');
include_once($root . '/private/Actions/Database/Factories/Factory.php');
include_once($root . '/private/Actions/Logs/Logs.php');


LogAction();

MethodVerify("GET");

if (CreateAllTables(Connection())) {
    echo "SeedAllTable Start";
    SeedAllTable();
    echo "SeedAllTable Finish";
} else {
    echo "Location: /errors/500/?error_message=Base de données déjà initialiser ou la base de données : " . DBNAME . " n'existe pas.CREATE DATABASE " . DBNAME . ";";
}
?>