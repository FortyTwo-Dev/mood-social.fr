<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Login - MoodSocial';
    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    include_once($root . '/private/Actions/MoodColor.php');
    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = RandomColor();

    LogAction();
?>

<?php include_once( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative dark:bg-ms-black bg-ms-white dark:text-ms-white text-ms-black transition-colors">

    <?php require_once( $root . '/resources/layout/notification/base.php' ) ?>

    <?php 
        $link = "/auth/register/"; 
        $text_link = "S'inscrire"; 
        $text = "Vous n'avez pas de compte ?";
        include_once( $root . '/resources/layout/auth/header.php' ); 
    ?>

	<?php include_once( $root . '/view/auth/login.php') ?>

    <?php include_once( $root . '/resources/layout/auth/footer.php' ) ?>

</body>
</html>