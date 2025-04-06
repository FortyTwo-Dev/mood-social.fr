<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';
    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/MoodColor.php');
    // include_once($root . '/private/Actions/Database/Connection.php');
    // include_once($root . '/private/Actions/Database/Seeders/MoodSeeder.php');

    MethodVerify("GET");
    $mood = RandomColor();

    // echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
?>


<?php include( $root . '/view/home.php' ) ?>