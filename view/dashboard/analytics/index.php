<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="w-full h-full col-span-10 pb-24 overflow-auto">
            <h1 class="text-2xl font-medium p-4 border-b mx-2">Analytics / Logs</h1>
            <div class="w-full h-full grid grid-cols-12 grid-rows-8 p-4 gap-4">
                <section class="relative col-span-3 row-span-3 p-4 flex flex-col items-center justify-between border border-gray-300 hover:border-ms-blue rounded-md">
                    <div class="flex flex-col items-center gap-4">
                        <div class="h-56 w-56">
                        <img src="/dashboard/analytics/store/" alt="Camembert des statuts">
                        </div>
                        <p class="text-3xl font-semibold"><?= $all_status[0]->status ?> <?= $all_status[0]->occurrences ?></p>
                    </div>
                </section>
            </div>
        </section>
    </main>
</body>
</html>