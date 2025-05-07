<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'En cours de construction';

    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Cookie/Cookie.php');
    include_once($root . '/private/Actions/Routing/Route.php');


    // ToRoute('/mood/choose/', 'Message de succès', 'success');
    // ToRoute('/mood/choose/', 'Message d\'information', 'info');
    // ToRoute('/mood/choose/', 'Message d\'erreur', 'error');
?>

<?php include( $root . '/view/under_construction.php' ) ?>