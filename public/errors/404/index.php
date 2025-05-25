<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - 404';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');


    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();
?>

<?php include_once( $root . '/view/errors/404.php' ) ?>