<?php
    $app = '';
    $root = $_SERVER['DOCUMENT_ROOT'] . $app;
    $page_title = 'MoodSocial';

    include_once($root . '/config/app.php');
    $i = rand(0,4);
?>

<?php include( $root . '/public/view/accueil.php' ) ?>