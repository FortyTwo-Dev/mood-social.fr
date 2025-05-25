<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - Feed General';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');

    include_once($root . '/private/Actions/Database/Query/Message.php');
    include_once($root . '/private/Actions/Database/Query/Talk.php');
    include_once($root . '/private/Actions/Database/Query/Mood.php');

    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();

    $messages = GetGroupMessages($_GET['talk_id']);
    $talk = GetTalk($_GET['talk_id']);
?>

<?php include( $root . '/view/talk/group/show.php' ) ?>