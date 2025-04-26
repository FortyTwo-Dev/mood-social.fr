<?php

require_once $root . '/private/Actions/Database/Database.php';

foreach (glob(__DIR__ . '/*Seeder.php') as $file) {
    require_once $file;
}

function SeedAllTable() {
    $conn = Connection();

    MoodSeeder($conn);
    RoleSeeder($conn);
    SubscriptionSeeder($conn);
}