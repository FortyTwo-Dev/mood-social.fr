<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen">
    <header class="w-full h-auto grid grid-cols-12 border-b-2 border-ms-grey ">
        <div class=" col-span-2 flex gap-4 items-center justify-center p-2">
            <img class="w-8 h-8" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
            <span class="text-2xl font-bold">MoodSocial</span>
        </div>
        <div class="col-span-2 col-end-13 flex justify-center items-center p-2">
            <p class=" text-xl font-semibold">Mon Compte</p>
        </div>
    </header>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
    </main>
</body>
</html>