<?php
    session_start();
    $app = '';
    $root = $_SERVER['DOCUMENT_ROOT'] . $app;
    $page_title = 'En cours de construction';

    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');
    
    LogAction();
?>

<?php include( $root . '/view/under_construction.php' ) ?>