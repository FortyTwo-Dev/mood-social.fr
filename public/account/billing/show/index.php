<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . '/private/Actions/Security/Method.php');
    
    MethodVerify("GET");
?>
<?php include_once($root . '/view/account/billing/index.php');?>