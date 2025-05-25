<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = "Account - Profile";
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Generic/Json.php');
    include_once($root . '/private/Actions/Generic/Javascript.php');

    
    MethodVerify("GET");
    $mood = SelectedColor();
?>
<?php include_once($root . '/view/account/profile/index.php');?>

