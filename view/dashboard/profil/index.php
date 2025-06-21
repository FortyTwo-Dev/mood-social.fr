<?php include($root . '/resources/layout/dashboard/head.php'); ?>

<body class="w-screen h-screen overflow-hidden bg-ms-white">

    <?php include($root . '/resources/layout/dashboard/header.php'); ?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include($root . '/resources/layout/dashboard/sidebar.php'); ?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Images</h1>
                <a href="/dashboard/profil/custom/create/" class="p-2 bg-ms-red text-ms-white rounded-md font-semibold">Ajouter une image</a>
            </div>
            <div class="overflow-x-auto mx-2">
                <table class="min-w-full divide-y divide-ms-grey">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Catégorie
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                id
                            </th>
                        </tr>

                    </thead>
                    <tbody class="divide-y divide-ms-grey">
                        <?php foreach ($images as $image): ?>
                            <tr class="hover:bg-ms-grey/10">
                                <td class="px-6 py-4 whitespace-nowrap"><?= $image->category ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $image->id ?></td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-4">

                                    <form action="/dashboard/profil/custom/delete/?id=<?= $image->id ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><button type="submit" class="text-ms-red font-medium hover:underline cursor-pointer">Supprimer</button></form>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>


        </section>
        <script src="/resources/js/profil_dashboard.js"></script>
    </main>
</body>

</html>