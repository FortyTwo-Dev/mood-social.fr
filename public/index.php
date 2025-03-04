<?php
    $app = '';
    $root = $_SERVER['DOCUMENT_ROOT'] . $app;
    $page_title = 'MoodSocial';

    include_once($root . '/private/Actions/RandomColor.php');
?>

<?php include( $root . '/view/accueil.php' ) ?>