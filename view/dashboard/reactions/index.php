<?php include( $root . '/resources/layout/dashboard/head.php' );?>
<body class="w-screen h-screen overflow-hidden bg-ms-white">

<?php include( $root . '/resources/layout/dashboard/header.php' );?>

    <main class="w-full h-full grid grid-cols-12">
        <?php include( $root . '/resources/layout/dashboard/sidebar.php' );?>

        <section class="col-span-10 mb-16 overflow-auto">
            <div class="p-4 border-b mx-2 flex items-center justify-between">
                <h1 class="text-2xl font-medium">Reactions</h1>
                <a href="/dashboard/reactions/create/" class="p-2 bg-ms-yellow text-ms-black rounded-md font-semibold">Ajouter une reaction</a>
            </div>
            <div class="overflow-x-auto mx-2">
                <table class="min-w-full divide-y divide-ms-grey">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Icon
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Dernière mise à jour
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Date de création
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-base font-bold text-ms-black uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ms-grey">

                        <?php foreach($data['reactions'] as $reaction): ?>
                            <tr class="hover:bg-ms-grey/10">
                                <td class="px-6 py-4 whitespace-nowrap font-medium stroke-[1.5px]"><?= htmlspecialchars_decode($reaction['emoji'])?></td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium"><?=$reaction['name']?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$reaction['created_at']?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$reaction['updated_at']?></td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-4">

                                    <a href="/dashboard/reactions/edit/?id=<?=$reaction['id']?>" class="text-ms-blue font-medium hover:underline">Modifier</a>

                                    <form action="/dashboard/reactions/delete/?id=<?=$reaction['id']?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><button type="submit" class="text-ms-red font-medium hover:underline cursor-pointer">Supprimer</button></form>

                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>