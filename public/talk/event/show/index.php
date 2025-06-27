<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - Evenement - Show';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');

    include_once($root . '/private/Actions/Database/Query/Talk.php');

    include_once($root . '/private/Actions/Event/Event.php');

    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();

    if (!EmailVerified()) { ToRoute('/'); }
    if (!IsAuth()) { ToRoute('/auth/login/'); }

    $data = Show();
?>

<?php include( $root . '/view/talk/event/show.php' ) ?>