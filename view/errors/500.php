
<?php include_once( $root . '/resources/layout/errors/head.php' ) ?>

<body class="w-screen h-screen">
    <main class="w-full h-full flex flex-col justify-center items-center gap-4 bg-ms-<?=$color[$i]['color']?> text-ms-<?=$color[$i]['text']?>">
        <h1 class="text-5xl font-bold">Server Error | 500</h1>
        <p class="text-lg font-medium"><?=htmlspecialchars($_GET['error_message'])?></p>
    </main>
</body>
</html>