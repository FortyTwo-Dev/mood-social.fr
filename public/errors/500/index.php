<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - 500';

    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/RandomColor.php');

    MethodVerify("GET");
    $i = RandomColor();

?>

<?php include( $root . '/view/errors/500.php' ) ?>