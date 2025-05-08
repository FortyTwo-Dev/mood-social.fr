<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = RandomColor();
    LogAction();
?>


<?php include( $root . '/view/talk/feed/index.php' ) ?>