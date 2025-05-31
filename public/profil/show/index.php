<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - Feed General';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');

    include_once($root . '/private/Actions/Database/Query/User.php');
    include_once($root . '/private/Actions/Database/Query/Mood.php');

    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();

    // if (!EmailVerified()) { ToRoute('/'); }

    // $messages = GetFeedMessages();
    $user = GetUserProfile( isset($_GET['id']) ? $_GET['id'] : GetUserId());
?>

<?php include( $root . '/view/profil/show.php' ) ?>