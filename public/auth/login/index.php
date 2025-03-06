<?php
	$app = '';
	$root = $_SERVER['DOCUMENT_ROOT'] . $app;
	$page_title = 'Login - MoodSocial';
	include_once($root . '/private/Actions/RandomColor.php');
?>

<?php include_once( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative">

    <?php 
        $link = "/auth/register"; 
        $text_link = "S'inscrire"; 
        $text = "Vous n'avez pas de compte ?";
        include_once( $root . '/resources/layout/auth/header.php' ); 
    ?>

	<?php include_once( $root . '/view/auth/login.php') ?>

    <?php include_once( $root . '/resources/layout/auth/footer.php' ) ?>

</body>
</html>