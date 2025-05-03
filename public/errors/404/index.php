<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - 404';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');


    MethodVerify("GET");
    $mood = RandomColor();
    LogAction();
?>

<?php include_once( $root . '/view/errors/404.php' ) ?>