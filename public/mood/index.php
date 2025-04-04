<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'Choose your mood';

    include_once($root . '/private/Actions/Security/MethodVerify.php');
    include_once($root . '/private/Actions/RandomColor.php');

    MethodVerify("GET");
    $i = RandomColor();
?>

<?php include_once( $root . '/resources/layout/mood/head.php' ) ?>

<body class="relative bg-ms-white dark:bg-ms-black text-ms-black dark:text-ms-white transition-colors">

    <?php include_once( $root . '/resources/layout/mood/header.php' ) ?>

    <?php include( $root . '/view/mood/choose.php' ) ?>

    <?php include_once( $root . '/resources/layout/mood/footer.php' ) ?>

</body>
</html>