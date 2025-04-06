<?php
    $app = '';
    $root = $_SERVER['DOCUMENT_ROOT'] . $app;
    $page_title = 'En cours de construction';

    include_once($root . '/private/Actions/MoodColor.php');
?>

<?php include( $root . '/view/under_construction.php' ) ?>