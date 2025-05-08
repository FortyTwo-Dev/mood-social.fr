<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'En cours de construction';

    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    LogAction();
?>

<?php include( $root . '/view/under_construction.php' )
?>