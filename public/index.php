<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Database/Query/User.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    // include_once($root . '/private/Actions/Database/Seeders/Seeder.php');
    // include_once($root . '/private/Actions/Database/Factories/Factory.php');
    // ResetDatabase();
    // SeedAllTable();

    MethodVerify("GET");
    $mood = RandomColor();

    // print_r($_SERVER);

    LogAction("string");
    print GetUserId();
?>


<?php include( $root . '/view/home.php' ) ?>