<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - 500';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');


    MethodVerify("GET");
    $mood = RandomColor();
    LogAction();
?>

<?php include( $root . '/view/errors/500.php' ) ?>