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
                    <a href="/dashboard/users/show/?id=<?=$user->id?>" class="flex justify-between items-center">
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 group-hover:stroke-ms-blue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            <div class=" h-12 w-12 rounded-full bg-gray-200"></div>
                            <p class="text-xl font-medium"><?=$user->username?></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <svg class="stroke-2 stroke-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                            <!-- <svg class="stroke-2 stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg> -->
                        </div>
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </section>
    </main>
</body>
</html>