<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - Feed General';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');

    include_once($root . '/private/Actions/Database/Query/Mood.php');
    include_once($root . '/private/Actions/Database/Query/User.php');
    include_once($root . '/private/Actions/Database/Query/Message.php');
    include_once($root . '/private/Actions/Database/Query/Reaction.php');

    include_once($root . '/private/Actions/Logs/Logs.php');
    include_once($root . '/private/Actions/Exchange/Exchange.php');

    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();

    if (!EmailVerified()) { ToRoute('/'); }
    if (!IsAuth()) { ToRoute('/auth/login/'); }
    if (!HaveUsername()) { ToRoute('/auth/username/'); }

    $data = Show();
?>

<?php include( $root . '/view/talk/exchange/show.php' ) ?>