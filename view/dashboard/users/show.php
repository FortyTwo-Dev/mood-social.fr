<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include( $root . '/resources/layout/dashboard/header.php' );?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>
        <section class="w-full h-fit col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2">
                <h1 class=" text-2xl font-medium">Utilisateurs / <?= $user->username ?></h1>
            </div>
            <div class="w-full h-full grid grid-cols-12 grid-rows-8 p-4 gap-4">
                <section class="relative col-span-3 row-span-4 p-4 flex flex-col items-center justify-between border border-gray-300 hover:border-ms-blue rounded-md">
                    <div class="absolute h-4 w-4 bg-green-500 rounded-full top-0 right-0 mr-4 mt-4"></div>
                    <div class="flex flex-col items-center gap-4">
                        <div class=" h-24 w-24 rounded-full bg-gray-300"></div>
                        <p class="text-3xl font-semibold"><?= $user->username ?></p>
                    </div>
                    <div class="flex flex-col items-center gap-3">
                        <p class="text-2xl">36 Amis</p>
                        <p class="text-2xl">36 Follower</p>
                        <p class="text-2xl">MoodSocial+</p>
                        <p class="text-2xl">Neutre</p>
                    </div>
                </section>
                <section class="col-span-9 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Moods</h2>
                    <ul class="flex flex-col gap-4">
                        <li class="flex justify-between items-center p-4 border-ms-yellow border rounded-md">
                            <p class="text-2xl font-medium underline decoration-ms-yellow">Joyeux</p>
                            <span class="text-2xl font-medium">17</span>
                        </li>
                        <li class="flex justify-between items-center p-4 border-ms-blue border rounded-md">
                            <p class="text-2xl font-medium underline decoration-ms-blue">Triste</p>
                            <span class="text-2xl font-medium">17</span>
                        </li>
                        <li class="flex justify-between items-center p-4 border-ms-purple border rounded-md">
                            <p class="text-2xl font-medium underline decoration-ms-purple">Stressé</p>
                            <span class="text-2xl font-medium">17</span>
                        </li>
                        <li class="flex justify-between items-center p-4 border-ms-red border rounded-md">
                            <p class="text-2xl font-medium underline decoration-ms-red">Aigris</p>
                            <span class="text-2xl font-medium">17</span>
                        </li>
                    </ul>
                </section>
                <section class="col-span-6 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Données</h2>
                    <ul class="w-full h-full flex flex-col items-center justify-between">
                        <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Email : </span> <p><?= $user->email ?></p></li>
                        <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Adresse : </span> <p>42 rue du rond point</p></li>
                        <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Code Postal : </span> <p>77000</p></li>
                        <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Ville : </span> <p>Ma Ville</p></li>
                        <li class="w-full px-6 text-2xl font-medium flex items-center justify-between"><span>Pays : </span> <p>France</p></li>
                    </ul>
                </section>
                <section class="col-span-6 row-span-4 p-3 gap-5 flex flex-col border border-gray-300 hover:border-ms-blue rounded-md">
                    <h2 class="text-2xl font-semibold">Actions</h2>
                    <ul class="flex flex-col gap-4">
                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-ms-white hover:bg-ms-blue">
                            <span class="text-2xl font-medium">Changer le mood actuel</span>
                        </li>
                        <li class="flex justify-center items-center p-4 border-ms-blue border rounded-md text-ms-blue bg-ms-white hover:text-ms-white hover:bg-ms-blue">
                            <span class="text-2xl font-medium">Envoyer un avertissement</span>
                        </li>
                        <li class="flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-ms-white hover:bg-ms-red">
                            <span class="text-2xl font-medium uppercase">Supprimer le compte</span>
                        </li>
                        <li class="flex justify-center items-center p-4 border-ms-red border rounded-md text-ms-red bg-ms-white hover:text-ms-white hover:bg-ms-red">
                            <span class="text-2xl font-medium uppercase">Bannir le compte</span>
                        </li>
                    </ul>
                </section>
            </div>
        </section>
    </main>
</body>
</html>