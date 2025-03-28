<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial';

    // include_once($root . '/private/Actions/Database/Connection.php');

    include_once($root . '/private/Actions/RandomColor.php');

    // $Method_Use = "POST";

    // include_once($root . '/private/Actions/Security/MethodVerify.php');
?>

<?php include( $root . '/view/home.php' ) ?>