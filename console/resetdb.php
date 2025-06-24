<?php 
$root = __DIR__ . '/../';

include_once($root . '/private/Actions/Database/Seeders/Seeder.php');
include_once($root . '/private/Actions/Database/Factories/Factory.php');

ResetDatabase();

echo "Seed All tables - Start\n";
SeedAllTable();
echo "Seed All tables - Finish\n";