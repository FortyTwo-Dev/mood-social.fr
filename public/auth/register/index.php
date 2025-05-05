<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Register - MoodSocial';
	include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = RandomColor();
    LogAction();
?>

<?php include_once( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white transition-colors">

    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

    <?php 
        $link = "/auth/login/"; 
        $text_link = "Se connecter"; 
        $text = "Vous avez déjà un compte ?";
        include_once( $root . '/resources/layout/auth/header.php' ); 
    ?>

    <?php include_once( $root . '/view/auth/register.php' ) ?>

    <?php include_once( $root . '/resources/layout/auth/footer.php' ) ?>

</body>
</html>