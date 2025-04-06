<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Login - MoodSocial';
    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/MoodColor.php');

    MethodVerify("GET");
    $mood = RandomColor();
?>

<?php include_once( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative dark:bg-ms-black bg-ms-white dark:text-ms-white text-ms-black transition-colors">

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