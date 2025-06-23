<?php
 include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="col-span-10 pb-24 overflow-auto">
            <h1 class="p-4 border-b mx-2 text-2xl font-medium">Utilisateurs</h1>
            <ul class="w-full h-full flex flex-col p-4 gap-5">
            <?php foreach($users as $user): ?>
            <li class="group p-4 w-full h-min rounded-md border border-gray-300 hover:border-ms-blue">
                <a href="/dashboard/users/show/?id=<?= $user->id ?>" class="flex justify-between items-center">
                    <div class="flex items-center gap-5">
                        <div class="h-12 w-12 rounded-full bg-gray-200"></div>
                        <p class="text-xl font-medium flex items-center gap-2">
                            <?= htmlspecialchars($user->username ?? '') ?>
                            <?php if (isset($user->status) && $user->status === 'banned'): ?>
                                <span class="ml-2 px-2 py-0.5 rounded bg-ms-red text-white text-xs font-bold uppercase flex items-center gap-1">
                                    <i data-lucide="gavel" class="inline w-4 h-4"></i>
                                    BAN
                                </span>
                            <?php endif; ?>
                        </p>
                    </div>
                </a>
            </li>
            <?php endforeach ?>
            </ul>
        </section>
    </main>
    
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>