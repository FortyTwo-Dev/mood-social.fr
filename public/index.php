<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';
    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/RandomColor.php');
    // include_once($root . '/private/Actions/Database/Connection.php');

    MethodVerify("GET");
    $i = RandomColor();

?>

<?php include( $root . '/view/home.php' ) ?>