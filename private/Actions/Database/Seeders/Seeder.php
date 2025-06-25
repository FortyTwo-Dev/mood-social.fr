<?php

require_once $root . '/private/Actions/Database/Database.php';

foreach (glob(__DIR__ . '/*Seeder.php') as $file) {
    require_once $file;
}

function SeedAllTable() {
    $conn = Connection();
    echo "Seed table - MOODS\n";
    MoodSeeder($conn);
    echo "Seed table - ROLES\n";
    RoleSeeder($conn);
    echo "Seed table - SUBSCRIPTIONS\n";
    SubscriptionSeeder($conn);
    echo "Seed table - USERS\n";
    UserSeeder($conn);
    echo "Seed table - CATCHAS\n";
    CaptchaSeeder($conn);
    echo "Seed table - REACTIONS\n";
    ReactionSeeder($conn);
    echo "Seed table - TALKS\n";
    TalkSeeder($conn);
    echo "Seed table - CUSTOMS\n";
    CustomSeeder($conn);    
    echo "Seed table - BADGES\n";
    BadgeSeeder($conn);
}