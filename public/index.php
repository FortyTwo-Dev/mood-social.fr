<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Database/Query/User.php');

    // include_once($root . '/private/Actions/Database/Seeders/Seeder.php');
    // include_once($root . '/private/Actions/Database/Factories/Factory.php');
    // ResetDatabase();
    // SeedAllTable();

    MethodVerify("GET");
    $mood = RandomColor();
    var_dump(EmailVerified());
    // echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

?>


<?php include( $root . '/view/home.php' ) ?>