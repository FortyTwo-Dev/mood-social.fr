<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$page_title = 'Register - MoodSocial';
	include_once($root . '/private/Actions/RandomColor.php');
?>

<?php include_once( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative">

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