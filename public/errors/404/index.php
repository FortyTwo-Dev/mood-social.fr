<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - 404';

    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/MoodColor.php');

    MethodVerify("GET");
    $mood = RandomColor();

?>

<?php include_once( $root . '/view/errors/404.php' ) ?>