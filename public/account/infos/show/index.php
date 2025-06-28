<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = "Account - information";
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Profil/Infos.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    
    
    
    MethodVerify("GET");
    LogAction();
?>
<?php include_once($root . '/view/account/infos/show.php');?>